<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('Employee');
// });

Route::get('/',    [EmployeeController::class, 'index'])->name('employee');
Route::get('/add',    [EmployeeController::class, 'addemployee'])->name('addemployee');
