<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Department;
use App\Models\Employee;



class AdminController extends Controller

{

    public function login()

    {
        return view('admin.login');
    }


    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        } else {
            Session::flash('error-message', 'Invalid Email or Password');
            return back();
        }
        
    }
    
    public function dashboard()
    {
        $departmentCount = Department::count();
        $employeeCount = Employee::count();
        return view('admin.dashboard', compact('departmentCount', 'employeeCount'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    // public function dashboard()
    // {
    //     $departmentCount = Department::count();
    //     $employeeCount = Employee::count();

    //     return view('admin.dashboard', compact('departmentCount', 'employeeCount'));
    // }
    
}
