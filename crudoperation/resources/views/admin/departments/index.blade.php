@extends('admin/layouts/admin')

@section('content')
<div class="app-content my-3 my-md-5">
    <div class="side-app">
        <div class="page-header"></div>
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Department List</h1>
                <div class="d-flex align-items-center">
                    <!-- Search Form -->
                    <form method="GET" action="{{ route('admin_departments_index') }}" class="mr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Enter Department Number" value="{{ request()->input('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary me-3" type="submit">Search</button>
                            </div>
                        </div>
                    </form>

                    <!-- Add Department Button -->
                    <a href="{{ route('admin_departments_create') }}" class="btn btn-success">Add Department</a>
                </div>
            </div>

            <!-- Display message if no departments are found -->
            @if($message)
            <div class="alert alert-warning text-center">
                {{ $message }}
            </div>
            @endif

            <!-- Department List Table -->
            @if($departments->isNotEmpty())
            <div class="card shadow mb-4">
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered table-hover table-vcenter text-nowrap">
                            <thead>
                                <tr>
                                    <th class="text-center" style="font-weight: bold; padding: 4px;">Id</th>
                                    <th class="text-center" style="font-weight: bold; padding: 4px;">Number</th>
                                    <th class="text-center" style="font-weight: bold; padding: 4px;">Name</th>
                                    <th class="text-center" style="font-weight: bold; padding: 4px;">Location</th>
                                    <th class="text-center" style="font-weight: bold; padding: 4px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departments as $department)
                                <tr>
                                    <td class="text-center" style="padding: 4px;">{{ $department->id }}</td>
                                    <td class="text-center" style="padding: 4px;">{{ $department->dep_no }}</td>
                                    <td class="text-center" style="padding: 4px;">{{ $department->dep_name }}</td>
                                    <td class="text-center" style="padding: 4px;">{{ $department->location }}</td>
                                    <td class="text-center" style="padding: 4px;">
                                        <a href="{{ route('admin_departments_view',['id' => $department->id]) }}" class="btn btn-primary btn-sm text-black" data-toggle="tooltip" data-original-title="View">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin_departments_edit', ['id' => $department->id]) }}" class="btn btn-success btn-sm text-black" data-toggle="tooltip" data-original-title="Edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('admin_departments_destroy', ['id' => $department->id]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm text-black" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete this department?');">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center">
                        {{ $departments->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
