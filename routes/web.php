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
Route::post('/loginPromise', [AccessController::class, 'loginDetails'])->name('loginPromise');
Route::get('/register', [AccessController::class, 'registerAdmin'])->name('register');
Route::post('/registerUser', [AccessController::class, 'registerDetails'])->name('registerUser');
// Route::post('/insertCreds', [EmployeeController::class, 'registerDetails'])->name('insertCreds');
// Route::post('/registerAccount', [AccessController::class, 'registerAdmin'])->name('registerAccount');
