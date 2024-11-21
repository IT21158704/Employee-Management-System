<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;


// Route for displaying all employees
Route::get('/', [EmployeeController::class, 'index']);

// Keep the resource route for '/employee' to manage other actions
Route::resource('employee', EmployeeController::class);
