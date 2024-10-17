<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AccessController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Employee
// Read
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
// Create
Route::get('/new',    [EmployeeController::class, 'addemployee'])->name('new');
Route::post('/insert', [EmployeeController::class, 'insertemployee'])->name('insert');
// Update
Route::get('/edit/{id}', [EmployeeController::class, 'editemployee'])->name('edit');
Route::post('/update/{id}', [EmployeeController::class, 'updateemployee'])->name('update');
// Delete
// Route::get('/delete/{id}', [EmployeeController::class, 'deleteemployee'])->name('delete');
Route::get('/toggle/{id}', [EmployeeController::class, 'toggleemployee'])->name('employee.toggle');

// Login/Register
Route::get('/login', [AccessController::class, 'loginAdmin'])->name('login');
Route::get('/register', [AccessController::class, 'registerAdmin'])->name('register');
Route::post('/registerInsert', [AccessController::class, 'registerDetails'])->name('registerInsert');
// Route::post('/registerAccount', [AccessController::class, 'registerAdmin'])->name('registerAccount');
