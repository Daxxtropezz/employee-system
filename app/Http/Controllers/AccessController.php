<?php

namespace App\Http\Controllers;

use App\Models\UserAccess;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AccessController extends Controller
{
    public function loginAdmin()
    {
        return view('Login');
    }

    public function loginDetails(Request $request)
    {
        // dd($request->only('email', 'password'));
        if (Auth::attempt($request->only('email', 'password'))) {
            dd('Login successful');
            return redirect('/');
        }
        dd('Invalid credentials', $request->only('email', 'password'));
        return redirect('login');
    }

    public function registerAdmin()
    {
        return view('Register');
    }

    public function registerDetails(Request $request)
    {
        // dd($request->all()); //for debugging
        $employee = Employee::create(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'birthdate' => $request->birthdate,
                'contact' => $request->contact,
                'sex' => $request->sex,
            ]
        );

        $employeeId = $employee->id;

        UserAccess::create(
            [
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'user_data' => $employeeId,
                'remember_token' => Str::random(60),
            ]
        );

        return redirect()->route('login')->with('success', 'A new employee has been added to the database!');
    }
}
