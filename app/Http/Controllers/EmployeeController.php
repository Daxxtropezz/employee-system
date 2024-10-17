<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Employee::where('first_name', 'LIKE', '%' . $request->search . '%')->whereNull('archived_at')->paginate(5);
        } else {
            $data = Employee::whereNull('archived_at')->paginate(5);
        }
        // $data = Employee::whereNull('archived_at')->get();
        // $data = Employee::all();
        // dd($data);
        return view('Employee', compact('data'));
    }

    public function addemployee()
    {
        return view('AddEmployee');
    }

    public function insertemployee(Request $request)
    {
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

    // public function deleteemployee($id)
    // {
    //     $data = Employee::find($id);
    //     $data->delete();
    //     return redirect()->route('employee')->with('success', 'An employee has been deleted to the database!');
    // }

    public function toggleemployee($id)
    {
        $employee = Employee::findOrFail($id);

        if (is_null($employee->archived_at)) {
            $employee->archived_at = Carbon::now('Asia/Manila');
        } else {
            $employee->archived_at = null;
        }

        $employee->save();

        return back()->with('status', 'Employee status updated successfully.');
    }
}
