@extends('admin/layouts/admin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-6">
            <div class="bg-light rounded h-100 p-4">
                <div class="text-center">
                    <h3>Add Departments</h3>
                </div>

                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                <br>

                <form method="POST" id="Register" action="{{ route('admin_departments_store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">Department Number<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="dep_no" value="{{ old('dep_no') }}" pattern="\d{4}" title="Department number must be exactly 4 digits" required>
                    </div>

                    <br>

                    <div class="form-group">
                        <label class="form-label">Department Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="dep_name" value="{{ old('dep_name') }}" required>
                    </div>

                    <br>

                    <div class="form-group">
                        <label class="form-label">Department Location<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="location" value="{{ old('location') }}" required>
                    </div>

                    <br>
                    <div class="form-group mb-0">
                        <div class="checkbox checkbox-secondary d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary me-2">Create</button>
                            <a href="{{ route('admin_departments_index') }}" class="btn btn-danger">Close</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
