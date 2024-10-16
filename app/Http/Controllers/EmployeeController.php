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

    public function insertemployee(Request $request)
    {

        $request->merge([
            'contact' => '+63' . $request->contact
        ]);

        // $request->validate([
        //     'fullname' => 'required|string|max:255',
        //     'contact' => 'required|string|max:10',
        //     'birthdate' => 'required|date',
        //     'sex' => 'required|in:male,female',
        // ]);

        // dd($request->all()); //for debugging
        Employee::create($request->all());
        return redirect()->route('employee')->with('success', 'A new employee has been added to the database!');
    }

    public function editemployee($id)
    {
        $data = Employee::find($id);
        return view('UpdateEmployee', compact('data'));
    }

    public function updateemployee(Request $request, $id)
    {
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('employee')->with('success', 'An employee has been updated to the database!');
    }
}
