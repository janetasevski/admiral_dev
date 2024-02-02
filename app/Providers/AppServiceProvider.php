<?php

namespace App\Providers;

use App\Repositories\CarRepository;
use App\Repositories\EmployeeRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CarRepository::class, CarRepository::class);
        $this->app->singleton(EmployeeRepository::class, EmployeeRepository::class);
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Model::unguard();
    }
}
