<?php

namespace App\Repositories;

use App\Interfaces\ResetPasswordInterface;
use App\Models\PasswordResets;

class ResetPasswordRepository implements ResetPasswordInterface {

    protected $reset;

    public function __construct(PasswordResets $reset) {
        $this->reset = $reset;
    }

    public function save($data) {
        $reset = new $this->reset;

        $reset->email = $data['email'];
        $reset->token = $data['token'];

        $reset->save();

        return $reset->fresh();
    }

    public function checkExist($data) {
        return $this->reset->where(['email' => $data['email'], 'token' => $data['token']])->first();
    }

    public function deleteByEmail($email) {
        return $this->reset->where(['email' => $email])->delete();
    }
}
