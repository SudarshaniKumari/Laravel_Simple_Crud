@extends('admin/layouts/admin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="text-center">
                    <h3>Add Employee</h3>
                </div>

                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <br>

                <form method="POST" action="{{ route('admin_employees_store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- First Column -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Employee Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="emp_no" placeholder="IT-0001" required value="{{ old('emp_no') }}">
                            </div>
                            <br>

                            <div class="form-group">
                                <label class="form-label">Employee Last Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="emp_lname" required value="{{ old('emp_lname') }}">
                            </div>
                            <br>

                            <div class="form-group">
                                <label class="form-label">Employee Hire Date<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="hiredate" required value="{{ old('hiredate') }}">
                            </div>
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Employee First Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="emp_fname" required value="{{ old('emp_fname') }}">
                            </div>
                            <br>

                            <div class="form-group">
                                <label class="form-label">Employee Job Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="job_name" required value="{{ old('job_name') }}">
                            </div>
                            <br>

                            <div class="form-group">
                                <label class="form-label">Employee Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                            </div>
                        </div>

                        <!-- Third Column -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Employee Phone Number<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="phonenumber" required value="{{ old('phonenumber') }}">
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="dep_no">Department<span class="text-danger">*</span></label>
                                <select name="dep_no" class="form-control" required>
                                    @foreach($departments as $department)
                                    <option value="{{ $department->dep_no }}" {{ old('dep_no') == $department->dep_no ? 'selected' : '' }}>
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
                            <button type="submit" class="btn btn-primary me-2">Create</button>
                            <a href="{{ route('admin_employees_index') }}" class="btn btn-danger">Close</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
