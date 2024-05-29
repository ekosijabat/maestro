<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\UserInterface;
use App\Interfaces\ResetPasswordInterface;

class RepositoryServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->bind(UserInterface::class);
        $this->app->bind(ResetPasswordInterface::class);
    }

    public function boot() {

    }
}
