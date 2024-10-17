<?php

namespace App\Http\Controllers;

use App\Models\UserAccess;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function loginAdmin()
    {
        return view('Login');
    }

    public function registerAdmin()
    {
        return view('Register');
    }

    public function registerDetails(Request $request)
    {
        // dd($request->all()); //for debugging
        UserAccess::create($request->all());
        // return redirect()->route('login')->with('success', 'A new employee has been added to the database!');
        return redirect()->back()->with('modal', 'show');
    }
}
