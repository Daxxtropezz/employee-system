<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;


// Route::get('/dashboard', function () {
//     return view('welcome');
// });
Route::get('/dashboard', [AccessController::class, 'dashboard']);
// Route::get('/dashboard', [AccessController::class, 'dashboard']) -> middleware('isLoggedIn');


// Employee
// Read
Route::get('/employee', [EmployeeController::class, 'employeeTable']);
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
Route::get('/', [AccessController::class, 'loginAdmin'])->name('login');
Route::post('/login', [AccessController::class, 'loginPromise'])->name('loginPromise');
Route::post('/register', [AccessController::class, 'registerDetails'])->name('registerUser');
Route::get('/logout', [AccessController::class, 'logout']);
