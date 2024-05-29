<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Config;
use Mail;
use Redirect;

use App\Services\UserService;
use App\Services\ResetPasswordService;

class AuthController extends Controller
{

    protected $userService;
    protected $resetService;

    public function __construct(UserService $userService, ResetPasswordService $resetService) {
        $this->userService = $userService;
        $this->resetService = $resetService;
    }

	public function login() {
		return view('content.signin');
	}

    public function register() {
        return view('content.register');
    }

	public function reload() {
		return response()->json(['captcha'=> captcha_img()]);
	}

	public function authenticate(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->except('captcha', '_token');

        if (Auth::attempt($data)) {
            return Redirect::to('/');
        } else {
            $validator->getMessageBag()->add('failed', 'Login failed. Please make sure your data is valid');
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }
	}

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'confirm-password' => 'required|same:password',
            'captcha' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->except('password', 'confirm-password', 'captcha');
        $data['password'] = Hash::make($request->password);

        try {
            $create = $this->userService->saveData($data);
            return Redirect::to('login')->with('message', 'Registration success');
        } catch (Exception $e) {
            $validator->getMessageBag()->add('failed', 'Registration failed. Please try again later');
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('login')->with('message', 'Logout success');
    }

    public function forgotPassword() {
        return view('content.forgotpassword');
    }

    public function submitForgotPassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $token = Str::random(64);
        $data = ['email' => $request->email, 'token' => $token];

        try {
            $reset = $this->resetService->saveData($data);

            if ($reset) {
                Mail::send('email.forgotPassword', ['token' => $token], function($message) use ($request) {
                    $message->from(config('maestro.mail_sender'));
                    $message->to($request->email);
                    $message->subject('Maestro - Reset Password');
                });

                return Redirect::back()->with('message', 'We have e-mailed your password reset link');
            }
        } catch (Exception $e) {
            $validator->getMessageBag()->add('failed', 'There is problem to send email reset password. Please try again');
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }
    }

    public function resetPassword($token) {
        return view('content.resetpassword', ['token' => $token]);
    }

    public function submitResetPassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:5',
            'confirm-password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $findEmail = $this->resetService->checkExist(['email' => $request->email, 'token' => $request->token]);

        if (!$findEmail) {
            $validator->getMessageBag()->add('password', 'Reset password link has been expired');
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        try {
            $user = $this->userService->updatePassword(['email' => $request->email, 'password' => Hash::make($request->password)]);

            if ($user) {
                $delete = $this->resetService->deleteByEmail($request->email);
            }
            return Redirect::to('login')->with('message', 'Your password has been changed');
        } catch (Exception $e) {
            $validator->getMessageBag()->add('failed', 'Reset password failed');
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

    }
}
