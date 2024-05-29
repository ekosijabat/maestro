<?php

namespace App\Interfaces;

interface UserInterface {
    public function save($data);
    public function updatePassword($email, $password);
}
