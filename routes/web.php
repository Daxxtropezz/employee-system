<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('Employee');
// });

Route::get('/',    [EmployeeController::class, 'index'])->name('employee');

Route::get('/add',    [EmployeeController::class, 'addemployee'])->name('add');
Route::post('/insert',    [EmployeeController::class, 'insertemployee'])->name('insert');

Route::get('/edit/{id}',    [EmployeeController::class, 'editemployee'])->name('edit');
Route::post('/update/{id}',    [EmployeeController::class, 'updateemployee'])->name('update');
