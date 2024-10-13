<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = Employee::all();
        // dd($data);
        return view('Employee', compact('data'));
    }

    public function addemployee()
    {
        return view('AddEmployee');
    }
}
