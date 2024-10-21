@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid pt-4 px-4">
     <div class="row g-4">
          <div class="col-sm-12">
               <div class="bg-light rounded h-100 p-4">
                    <div class="text-center">
                         <h3>Update Employee</h3>
                    </div>

                    @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                    <br>

                    <form action="{{ route('admin_employees_update', $employee->id) }}" method="POST">
                         @csrf
                         @method('PUT')
                         <div class="row">
                              <div class="col-md-4">
                                   <div class="form-group">
                                        <label class="form-label">Employee Number<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="emp_no" value="{{ $employee->emp_no }}" readonly>
                                   </div>
                                   <br>
                                   <div class="form-group">
                                        <label class="form-label">Employee First Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="emp_fname" value="{{ $employee->emp_fname }}">
                                   </div>
                                   <br>
                                   <div class="form-group">
                                        <label class="form-label">Employee Last Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="emp_lname" value="{{ $employee->emp_lname }}">
                                   </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group">
                                        <label class="form-label">Employee Job Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="job_name" value="{{ $employee->job_name }}">
                                   </div>
                                   <br>
                                   <div class="form-group">
                                        <label class="form-label">Employee Hire Date<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="hiredate" value="{{ $employee->hiredate }}">
                                   </div>
                                   <br>
                                   <div class="form-group">
                                        <label class="form-label">Employee Email<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" value="{{ $employee->email }}">
                                   </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group">
                                        <label class="form-label">Employee Phone Number<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="phonenumber" value="{{ $employee->phonenumber }}">
                                   </div>
                                   <br>
                                   <div class="form-group">
                                        <label class="form-label">Department<span class="text-danger">*</span></label>
                                        <select class="form-control" name="dep_no">
                                             @foreach($departments as $department)
                                             <option value="{{ $department->dep_no }}" {{ $employee->dep_no == $department->dep_no ? 'selected' : '' }}>
                                                  {{ $department->dep_no }} - {{ $department->dep_name }}
                                             </option>
                                             @endforeach
                                        </select>
                                   </div>
                              </div>
                         </div>
                         <br>
                         <div class="form-group mb-0">
                              <div class="checkbox checkbox-secondary d-flex justify-content-center">
                                   <button type="submit" class="btn btn-primary me-2">Save</button>
                                   <a href="{{ route('admin_employees_index') }}" class="btn btn-danger">Close</a>
                              </div>
                         </div>
                    </form>

               </div>
          </div>
     </div>
</div>
@endsection