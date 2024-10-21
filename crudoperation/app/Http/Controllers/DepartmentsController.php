<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DepartmentsController extends Controller
{
    public function admin_departments_create(): View
    {
        return view('admin.departments.create');
    }

    public function admin_departments_store(Request $request)
    {
        $request->validate([
            'dep_no' => ['required', 'regex:/^\d{4}$/', 'unique:departments,dep_no'], 
            'dep_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ], [
            'dep_no.regex' => 'Department number must contain exactly 4 digits.', 
        ]);

        Department::create([
            'dep_no' => $request->input('dep_no'),
            'dep_name' => $request->input('dep_name'),
            'location' => $request->input('location'),
        ]);

        return back()->with('success', 'Department created successfully.');
    }



    public function admin_departments_index(Request $request)
    {
        $search = $request->input('search');
    
        if ($search) {
            $departments = Department::where('dep_no', 'LIKE', "%{$search}%")->paginate(5);
            $message = $departments->isEmpty() ? 'No departments found for the search query.' : null;
        } else {
            $departments = Department::paginate(5);
            $message = null;
        }
    
        return view('admin.departments.index', compact('departments', 'message'));
    }

    

    public function admin_departments_view($id): View
    {
        $data = Department::findOrFail($id); 
        return view('admin.departments.view', ['data' => $data]);
    }

    public function admin_departments_edit($id): View
    {
        $department = Department::findOrFail($id); 
        return view('admin.departments.edit', compact('department'));
    }

    public function admin_departments_update(Request $request, $id)
    {
        $request->validate([
            'dep_no' => ['required', 'regex:/^\d{4}$/', 'unique:departments,dep_no,' . $id], 
            'dep_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ], [
            'dep_no.regex' => 'Department number must contain exactly 4 digits.', 
        ]);

        $department = Department::findOrFail($id);
        $department->dep_no = $request->input('dep_no');
        $department->dep_name = $request->input('dep_name');
        $department->location = $request->input('location');
        $department->save();

        return back()->with('success', 'Department updated successfully.');
    }

    public function admin_departments_destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('admin_departments_index')
            ->with('success', 'Department deleted successfully.');
    }
}
