<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\Auth\AuthService;
use App\Service\Auth\AuthServiseInterface;
use App\Service\Company\CompanyService;
use App\Service\Company\CompanyServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthServiseInterface::class, AuthService::class);
        $this->app->bind(CompanyServiceInterface::class, CompanyService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
