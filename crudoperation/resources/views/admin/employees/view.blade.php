@extends('admin/layouts/admin')

@section('content')
<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="text-center">
                    <h3>View Employee</h3>
                </div>
                <br>
                <form>
                    <div class="row">
                        <!-- First Column -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Employee Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="emp_no" value="{{ $employee->emp_no }}" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="form-label">Employee Job Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="job_name" value="{{ $employee->job_name }}" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="form-label">Employee Phone Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="phonenumber" value="{{ $employee->phonenumber }}" readonly>
                            </div>
                        </div>
                        
                        <!-- Second Column -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Employee First Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="emp_fname" value="{{ $employee->emp_fname }}" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="form-label">Employee Hire Date<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="hiredate" value="{{ $employee->hiredate }}" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="form-label">Department<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="department" value="{{ $employee->department->dep_no }} - {{ $employee->department->dep_name }}" readonly>
                            </div>
                        </div>
                        
                        <!-- Third Column -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Employee Last Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="emp_lname" value="{{ $employee->emp_lname }}" readonly>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="form-label">Employee Email<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email" value="{{ $employee->email }}" readonly>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="form-group mb-0">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admin_employees_index') }}" class="btn btn-danger">Close</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Form End -->

@endsection