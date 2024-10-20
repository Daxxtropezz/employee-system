<?php

namespace App\Http\Controllers;

use App\Models\UserAccess;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        $validatedData = $request->validate([
            'username' => 'required|alpha_num|min:3|max:20',
            'password' => 'required|min:6',
        ], [
            'username.required' => 'Please enter your username.',
            'username.alpha_num' => 'The username should only contain letters and numbers.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Your password must be at least 6 characters long.',
        ]);

        $userAccess = UserAccess::where('username', '=', $request->username)->first();
        if ($userAccess) {
            if (Hash::check($request->password, $userAccess->password)) {
                $request->session()->put('loginId', $userAccess->id);
                return redirect('/dashboard');
            }
            return redirect('/')->withErrors(['password' => 'Incorrect password.']);
        }
        return redirect('/')->withErrors(['username' => 'User not found.']);
    }

    public function dashboard()
    {
        if (Session::has('loginId')) {
            $user_data = UserAccess::where('id', '=', Session::get('loginId'))->first();
            if (!$user_data) {
                return redirect('/')->with('fail', 'You need to log in first!');
            }
        } else {
            return redirect('/')->with('fail', 'You need to log in first!');
        }
        $user_count = UserAccess::where('user_type', '=', 'user')->count();
        $data = Employee::whereNull('archived_at')->paginate(5);
        return view('welcome', compact('user_data', 'data', 'user_count'));
    }

    public function registerDetails(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'birthdate' => 'required|date|before:today|date_format:Y-m-d',
            'contact' => 'required|string|max:15',
            'sex' => 'required|in:male,female',
            'username' => 'required|string|alpha_num|min:3|max:20|unique:user_accesses,username',
            'email' => 'required|email|unique:user_accesses,email',
            'password' => 'required|string|min:6',
            'checkbox' => 'required|accepted',
        ], [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'birthdate.required' => 'Birthdate is required.',
            'contact.required' => 'Contact number is required.',
            'sex.required' => 'Sex is required.',
            'username.required' => 'Username is required.',
            'username.unique' => 'This username has already been taken.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters long.',
            'checkbox' => 'Make sure you read the terms and conditions.',
        ]);

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

        return redirect('/')->with('success', 'A new employee has been added to the database!');
    }

    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('/');
        }
    }
}
