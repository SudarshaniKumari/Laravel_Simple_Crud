@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-6">
            <div class="bg-light rounded h-100 p-4">
                <div class="text-center">
                    <h3>Update Department</h3>
                </div>
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <br>

                <form method="POST" action="{{ route('admin_departments_update', $department->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="form-label">Department Number<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="dep_no" value="{{ $department->dep_no }}" required>
                    </div>
                    <br>

                    <div class="form-group">
                        <label class="form-label">Department Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="dep_name" value="{{ $department->dep_name }}" required>
                    </div>
                    <br>

                    <div class="form-group">
                        <label class="form-label">Department Location<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="location" value="{{ $department->location }}" required>
                    </div>
                    <br>

                    <div class="form-group mb-0">
                        <div class="checkbox checkbox-secondary d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                            <a href="{{ route('admin_departments_index') }}" class="btn btn-danger">Close</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection