 <!-- Sidebar Start -->
 <div class="sidebar pe-4 pb-3">
     <nav class="navbar bg-light navbar-light">

         <div class="d-flex align-items-center ms-4 mb-4">
             <div class="position-relative">
                 <img class="rounded-circle" src="../assets/img/testimonial-1.jpg" alt="" style="width: 40px; height: 40px;">
                 <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
             </div>
             <div class="ms-3">

                 <span>Admin</span>
             </div>
         </div>
         <div class="container-fluid">
             <div class="navbar-nav w-100">
                 <a href="{{ route('dashboard') }}" class="nav-item nav-link {{ request()->routeIs('admin_dashboard') ? 'active' : '' }}">
                     <i class="fa fa-tachometer-alt me-2"></i> Dashboard
                 </a>
                 <a href="{{ route('admin_departments_index') }}" class="nav-item nav-link {{ request()->routeIs('admin_departments*') ? 'active' : '' }}">
                     <i class="fas fa-building me-2"></i> Departments
                 </a>
                 <a href="{{ route('admin_employees_index') }}" class="nav-item nav-link {{ request()->routeIs('admin_employees*') ? 'active' : '' }}">
                     <i class="fas fa-users me-2"></i> Employees
                 </a>
                 <a href="{{ route('logout') }}" class="nav-item nav-link">
                     <i class="fas fa-sign-out me-2"></i> Logout
                 </a>
             </div>
         </div>

     </nav>
 </div>
 <!-- Sidebar End -->