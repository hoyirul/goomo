<!-- Sidebar -->
<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center mb-5 justify-content-center" href="{{ url('/home') }}">
    <div class="sidebar-brand-icon rotate-n-15 px-1">
      <i class="fas fa-book"></i>
    </div><br>
    <div class="sidebar-brand-text">BOOKSTORE</div>
  </a>

  <div class="profile text-center mb-3">
    @if (Auth::user()->photo_profile == null)
      <img class="img-profile rounded-circle w-25" src="{{ asset('/img/profile.png') }}">
    @else
      <img class="img-profile rounded-circle w-25" src="{{ asset('storage/'.Auth::user()->photo_profile) }}">
    @endif
    <p class="text-white fs-normal">
      {{ auth()->user()->email }} <br>
      <span class="fs-small">{{ auth()->user()->role }} Bookstore</span>
    </p>
  </div>

  <!-- Nav Item - Dashboard -->

  @if (Auth::user()->role == 'admin')
    <li class="nav-item active border-top border-bottom">  
      <a class="nav-link px-5" href="/u/dashboard">
        <i class="fas fa-fw fa-home"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item active border-bottom">
      <a class="nav-link px-5 collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
        <i class="fas fa-fw fa-users"></i>
        <span>Users</span>
      </a>
      <div id="collapseUsers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">User Supports</h6>
          <a class="collapse-item" href="/u/admins">Admin</a>
          <a class="collapse-item" href="/u/customers">Customers</a>
          {{-- <div class="collapse-divider"></div>
          <h6 class="collapse-header">Other Pages:</h6>
          <a class="collapse-item" href="#">404 Page</a>
          <a class="collapse-item" href="#">Blank Page</a> --}}
        </div>
      </div>
    </li>
  
    <li class="nav-item active border-bottom">
      <a class="nav-link px-5 collapsed" data-id="masterData" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
        <i class="fas fa-fw fa-folder"></i>
        <span>Master</span>
      </a>
      <div id="collapseMaster" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Book Supports</h6>
          <a class="collapse-item" data-id="authors" href="/u/author">Authors</a>
          <a class="collapse-item" href="/u/publisher">Publishers</a>
          <a class="collapse-item" href="/u/genre">Genres</a>
          {{-- <div class="collapse-divider"></div>
          <h6 class="collapse-header">Other Pages:</h6>
          <a class="collapse-item" href="#">404 Page</a>
          <a class="collapse-item" href="#">Blank Page</a> --}}
        </div>
      </div>
    </li>

    <li class="nav-item active border-top border-bottom">  
      <a class="nav-link px-5" href="/u/book">
        <i class="fas fa-fw fa-book"></i>
        <span>Buku</span>
      </a>
    </li>

    <li class="nav-item active border-bottom">  
      <a class="nav-link px-5" href="/u/transaction">
        <i class="fas fa-fw fa-money-check"></i>
        <span>Transaksi</span>
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