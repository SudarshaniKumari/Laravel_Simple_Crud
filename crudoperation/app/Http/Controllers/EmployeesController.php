<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin_employees_index(Request $request)
    {
        $query = Employee::with('department');
    
       
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('emp_no', 'LIKE', "%{$search}%");
        }
    
       
        $employees = $query->paginate(4); 
        $message = $employees->isEmpty() ? 'No employees found for the entered employee number.' : null;
    
        return view('admin.employees.index', compact('employees', 'message'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function admin_employees_create(): View
    {
        $departments = Department::all();
        return view('admin.employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function admin_employees_store(Request $request)
    {
       
        $messages = [
            'emp_no.regex' => 'Employee number must be in the format IT-0001 and contain four digits.',
        ];

        
        $validatedData = $request->validate([
            'emp_no' => [
                'required',
                'regex:/^[A-Z]{2}-\d{4}$/', 
                'unique:employees'
            ],
            'emp_fname' => 'required|string|max:255',
            'emp_lname' => 'required|string|max:255',
            'job_name' => 'required|string|max:255',
            'hiredate' => 'required|date',
            'email' => 'required|email|unique:employees',
            'phonenumber' => 'required|digits:10',
            'dep_no' => 'required|exists:departments,dep_no',
        ], $messages);

        
        $existingEmployee = Employee::where('emp_no', $request->input('emp_no'))
            ->orWhere('email', $request->input('email'))
            ->first();

        if ($existingEmployee) {
            return back()->withErrors([
                'duplicate' => 'An employee with the same number or email already exists.'
            ])->withInput();
        }

        
        Employee::create($validatedData);

       
        return redirect()->route('admin_employees_index')->with('success', 'Employee added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function admin_employee_view($id): View
    {
       
        $employee = Employee::findOrFail($id);
        return view('admin.employees.view', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function admin_employees_edit($id): View
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all(); // Fetch all departments
        return view('admin.employees.edit', compact('employee', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function admin_employees_update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

      
        $request->validate([
            'emp_fname' => 'required|string|max:255',
            'emp_lname' => 'required|string|max:255',
            'job_name' => 'required|string|max:255',
            'hiredate' => 'required|date',
            'email' => 'required|email|max:255',
            'phonenumber' => 'required|string|max:20',
            'dep_no' => 'required|exists:departments,dep_no',
        ]);

        
        $employee->update([
            'emp_fname' => $request->emp_fname,
            'emp_lname' => $request->emp_lname,
            'job_name' => $request->job_name,
            'hiredate' => $request->hiredate,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'dep_no' => $request->dep_no,
        ]);

        
        return back()->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function admin_employees_destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('admin_employees_index')->with('success', 'Employee deleted successfully.');
    }
}
