<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface {

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function save($data) {
        $user = new $this->user;

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();

        return $user->fresh();
    }

    public function updatePassword($email, $password) {
        $user = $this->user->where('email', $email)->update(['password' => $password]);

        return $user;
    }
}
