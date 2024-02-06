<?php

namespace App\Providers;

use App\Models\Employee;
use App\Repositories\CarRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\EmployeeRepository;
use App\Repositories\ProfileRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CarRepository::class, CarRepository::class);
        $this->app->bind(ProfileRepository::class, ProfileRepository::class);
        $this->app->bind(EmployeeRepository::class, EmployeeRepository::class);
        $this->app->bind(UserRepository::class, UserRepository::class);

    
}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
