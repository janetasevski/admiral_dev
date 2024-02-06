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
        $this->app->bind(CarRepository::class, function () {
            return new CarRepository();
        });

        $this->app->bind(EmployeeRepository::class, function () {
            return new EmployeeRepository();
        });
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
