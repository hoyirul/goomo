<!-- Sidebar -->
<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center mb-5 justify-content-center" href="{{ url('/') }}">
    <div class="sidebar-brand-icon px-1">
      {{-- <i class="fas fa-book"></i> --}}
      <img src="{{ asset('img/logo-putih.png') }}" alt="Goomo">
    </div><br>
    <div class="sidebar-brand-text">Goomo</div>
  </a>

  <div class="profile text-center mb-3">
    <p class="text-white fs-normal">
      
      <span class="fs-small"> Goomo</span>
    </p>
  </div>

  <!-- Nav Item - Dashboard -->

  @if (Auth::user()->role_id == 2)
    <li class="nav-item active border-top border-bottom">  
      <a class="nav-link px-5" href="/operator/dashboard">
        <i class="fas fa-fw fa-home"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item active border-bottom">
      <a class="nav-link px-5 collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
        <i class="fas fa-fw fa-users"></i>
        <span>User</span>
      </a>
      <div id="collapseUsers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">User Supports</h6>
          <a class="collapse-item" href="/operator/admin">Admin</a>
          <a class="collapse-item" href="/operator/owner">Owner</a>
          <a class="collapse-item" href="/operator/customer">Customer</a>
          {{-- <div class="collapse-divider"></div>
          <h6 class="collapse-header">Other Pages:</h6>
          <a class="collapse-item" href="#">404 Page</a>
          <a class="collapse-item" href="#">Blank Page</a> --}}
        </div>
      </div>
    </li>
  
    <li class="nav-item active border-bottom">
      <a class="nav-link px-5 collapsed" data-id="masterData" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
        <i class="fas fa-fw fa-motorcycle"></i>
        <span>Master</span>
      </a>
      <div id="collapseMaster" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Book Supports</h6>
          <a class="collapse-item" data-id="Motorcycle" href="/operator/motorcycle">Motorcycle</a>
          <a class="collapse-item" href="/operator/motorcyclebrand">Motorcycle Brand</a>
          <a class="collapse-item" href="/operator/motorcycletype">Motorcycle Type</a>
          {{-- <div class="collapse-divider"></div>
          <h6 class="collapse-header">Other Pages:</h6>
          <a class="collapse-item" href="#">404 Page</a>
          <a class="collapse-item" href="#">Blank Page</a> --}}
        </div>
      </div>
    </li>

    <li class="nav-item active border-bottom">  
      <a class="nav-link px-5" href="/operator/transaction">
        <i class="fas fa-fw fas fa-shopping-cart"></i>
        <span>Transaksi</span>
      </a>
    </li>

    <li class="nav-item active border-top border-bottom">  
      <a class="nav-link px-5" href="/operator/payment">
        <i class="fas fa-fw fa-money-check-alt"></i>
        <span>Payment</span>
      </a>
    </li>

    
  @endif

  {{-- <li class="nav-item active border-bottom">  
    <a class="nav-link px-5" href="{{ route('home') }}">
      <i class="fas fa-fw fa-hdd"></i>
      <span>Backup Data</span>
    </a>
  </li> --}}

  <li class="nav-item active border-bottom">  
    <a class="nav-link px-5" href="#" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-sign-out-alt mx-1"></i>
      <span>Keluar</span>
    </a>
  </li>
  

  <!-- Sidebar Toggler (Sidebar) -->
  {{-- <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div> --}}

</ul>
<!-- End of Sidebar -->