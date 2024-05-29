<?php

namespace App\Interfaces;

interface ResetPasswordInterface {
    public function save($data);
    public function checkExist($data);
    public function deleteByEmail($email);
}
