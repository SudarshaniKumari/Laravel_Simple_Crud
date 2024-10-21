@extends('admin/layouts/admin')

@section('content')
<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-6">
            <div class="bg-light rounded h-100 p-4">
                <div class="text-center">
                    <h3>View Department</h3>
                </div>

                <br>

                <form>
                    <div class="form-group">
                        <label class="form-label">Department Number<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="id" value="{{ $data->dep_no }}" readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label">Department Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="id" value="{{ $data->dep_name }}" readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label">Department Location<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="department_name" value="{{ $data->location }}" readonly>
                    </div>
                    <br>
                    <div class="form-group mb-0">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admin_departments_index') }}" class="btn btn-danger">Close</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Form End -->
@endsection
