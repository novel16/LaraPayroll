 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="mdi mdi-currency-usd menu-icon"></i>
          <span class="menu-title">Attendace</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-layers menu-icon"></i>
          <span class="menu-title">Employees</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/category/create-category')}}">Employee List</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/category')}}">Overtime</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/category')}}">Cash Advance</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/category')}}">Schedules</a></li>
          </ul>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/deductions')}}">
          <i class="mdi mdi-tag-multiple menu-icon"></i>
          <span class="menu-title">Deductions</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/positions')}}">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Positions</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/slider') }}">
          <i class="mdi mdi-view-carousel menu-icon"></i>
          <span class="menu-title">Payroll</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/icons/mdi.html">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Schedule</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="documentation/documentation.html">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>