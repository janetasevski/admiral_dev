<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/people');
Route::resource('people', PersonController::class);

