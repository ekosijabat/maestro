<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class UserService {
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function saveData($data) {
        DB::beginTransaction();

        try {
            $user = $this->userRepository->save($data);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to save data');
        }

        DB::commit();

        return $user;
    }

    public function updatePassword($data) {
        DB::beginTransaction();

        try {
            $user = $this->userRepository->updatePassword($data['email'], $data['password']);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update data');
        }

        DB::commit();

        return $user;
    }
}
