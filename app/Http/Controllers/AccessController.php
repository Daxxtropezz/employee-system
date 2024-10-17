<?php

namespace App\Http\Controllers;

use App\Models\UserAccess;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccessController extends Controller
{
    public function loginAdmin()
    {
        return view('Login');
    }

    public function loginPromise(Request $request)
    {
        $userAccess = UserAccess::where('email', '=', $request->email)->first();
        if ($userAccess) {
            if (Hash::check($request->password, $userAccess->password)) {
                $request->session()->put('id', $userAccess->id);
                return redirect('/dashboard');
            }
            return redirect('/'); // Incorrect credentials
        }

        return redirect('/'); // User not found
    }
    public function dashboard()
    {
        $user_data = null;
        if (Session::has('id')) {
            $user_data = UserAccess::where('id', '=', Session::get('id'))->first();
        }
        $data = Employee::whereNull('archived_at')->paginate(5);
        return view('welcome', compact('user_data', 'data'));
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

        return redirect()->route('/')->with('success', 'A new employee has been added to the database!');
    }

    public function logout()
    {
        if (Session::has('id')) {
            Session::pull('id');
            return redirect('/');
        }
    }
}
