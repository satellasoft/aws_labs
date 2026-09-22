<?php

namespace App\Providers;

use App\Contracts\ComprehendServiceInterface;
use App\Contracts\PollyServiceInterface;
use App\Services\AwsComprehendService;
use App\Services\AwsPollyService;
use Illuminate\Support\ServiceProvider;

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

        $this->app->bind(
            PollyServiceInterface::class,
            AwsPollyService::class
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
