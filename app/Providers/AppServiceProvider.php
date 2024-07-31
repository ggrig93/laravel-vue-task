<?php

namespace App\Providers;

use App\Interfaces\AuthInterface;
use App\Interfaces\PaymentInterface;
use App\Interfaces\UserInterface;
use App\Services\AuthService;
use App\Services\PaymentService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentInterface::class, PaymentService::class);
        $this->app->bind(AuthInterface::class, AuthService::class);
        $this->app->bind(UserInterface::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
