<?php

namespace App\Providers;

use App\Models\Employee;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\EmployeeRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       // Bind the EmployeeRepository interface to its implementation
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
