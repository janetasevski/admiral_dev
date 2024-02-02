<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Routes accessible only to guests (unauthenticated users)
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [UserController::class, 'register']);

    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserController::class, 'login']);
});


Route::middleware(['auth'])->group(function () {
    // Route for accessing the home page
    Route::get('/', function () {
        return view('home');
    })->name('home');

});

//Profile Routes
Route::middleware(['auth'])->group(function () {

    //Route for displaying the edit profile page
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('edit.profile');

    Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');

    // Logout route
    Route::post('/logout', [UserController::class, 'logout']);
});


//Employees Routes
Route::middleware(['auth'])->group(function () {
     // Route for displaying the list of employees (home page)
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
    // Route for displaying the form for creating a new employee
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');

    // Route for storing the new employee data  
    Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');

    // Route for displaying the employee edit form
    Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');

    // Route for updating the employee data
    Route::put('/employee/{employee}', [EmployeeController::class, 'update'])->name('employee.update');

    // Route for deleting the employee
    Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
});

//Users Routes (Admin only)


Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});

//Cars Routes
Route::middleware(['auth'])->group(function () {
    // Route for displaying the list of cars (home page)
    Route::get('/cars', [CarController::class, 'index'])->name('car.index');
    // Route for displaying the form for creating a new car
    Route::get('/car/create', [CarController::class, 'create'])->name('car.create');

    // Route for storing the new car data  
    Route::post('/car', [CarController::class, 'store'])->name('car.store');

    // Route for displaying the car edit form
    Route::get('/car/{car}/edit', [CarController::class, 'edit'])->name('car.edit');

    // Route for updating the car data
    Route::put('/car/{car}', [CarController::class, 'update'])->name('car.update');

    // Route for deleting the car
    Route::delete('/car/{car}', [CarController::class, 'destroy'])->name('car.destroy');
});
