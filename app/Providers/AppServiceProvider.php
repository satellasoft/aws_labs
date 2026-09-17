<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AwsComprehendService;
use App\Contracts\ComprehendServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ComprehendServiceInterface::class,
            AwsComprehendService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
