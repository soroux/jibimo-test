<?php

namespace App\Providers;

use App\Factory\Bank\BankFactory;
use App\Factory\Bank\BankFactoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(BankFactoryInterface::class,function ($app){
            return new BankFactory($app);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
