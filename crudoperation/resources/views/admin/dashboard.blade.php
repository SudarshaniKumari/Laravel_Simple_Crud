@extends('admin/layouts/admin')

@section('content')
<!-- Dashboard Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row justify-content-center align-items-center">
        <!-- Departments Section -->
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="bg-light rounded d-flex flex-column align-items-center p-4 text-center">
                <i class="fa fa-building fa-3x mb-3 text-primary"></i> 
                <div>
                    <h6 class="mb-1">Departments</h6>
                    <h2 class="mb-0">{{ $departmentCount }}</h2> 
                </div>
            </div>
        </div>

        <!-- Employees Section -->
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="bg-light rounded d-flex flex-column align-items-center p-4 text-center">
                <i class="fa fa-users fa-3x mb-3 text-success"></i> 
                <div>
                    <h6 class="mb-1">Employees</h6>
                    <h2 class="mb-0">{{ $employeeCount }}</h2> 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard End -->
@endsection
