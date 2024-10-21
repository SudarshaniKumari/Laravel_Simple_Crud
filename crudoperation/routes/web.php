<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeesController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', function () {
    return view('admin.login');
});

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'loginPost'])->name('admin.login.post');
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('admin/departments/create', [DepartmentsController::class, 'admin_departments_create'])->name('admin_departments_create');
    Route::post('admin/departments/create', [DepartmentsController::class, 'admin_departments_store'])->name('admin_departments_store');
    Route::get('admin/departments/index', [DepartmentsController::class, 'admin_departments_index'])->name('admin_departments_index');
    Route::get('admin/departments/view/{id}', [DepartmentsController::class, 'admin_departments_view'])->name('admin_departments_view');
    Route::get('admin/departments/edit/{id}', [DepartmentsController::class, 'admin_departments_edit'])->name('admin_departments_edit');
    Route::put('admin/departments/update/{id}', [DepartmentsController::class, 'admin_departments_update'])->name('admin_departments_update');
    Route::delete('admin/departments/destroy/{id}', [DepartmentsController::class, 'admin_departments_destroy'])->name('admin_departments_destroy');
    Route::get('admin/employees/create', [EmployeesController::class, 'admin_employees_create'])->name('admin_employees_create');
    Route::post('admin/employees/create', [EmployeesController::class, 'admin_employees_store'])->name('admin_employees_store');
    Route::get('admin/employees/index', [EmployeesController::class, 'admin_employees_index'])->name('admin_employees_index');
    Route::get('admin/employees/view/{id}', [EmployeesController::class, 'admin_employee_view'])->name('admin_employees_view');
    Route::get('admin/employees/edit/{id}', [EmployeesController::class, 'admin_employees_edit'])->name('admin_employees_edit');
    Route::put('admin/employees/update/{id}', [EmployeesController::class, 'admin_employees_update'])->name('admin_employees_update');
    Route::delete('admin/employees/destroy/{id}', [EmployeesController::class, 'admin_employees_destroy'])->name('admin_employees_destroy');


});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
