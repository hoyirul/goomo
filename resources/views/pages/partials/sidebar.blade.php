<div class="col-md-3 mb-3">
    <div class="card w-100 border-0 rad-10">
      <div class="card-body">
        <h4 class="fs-medium font-medium px-3 mt-3">Navigation</h4>
        <div class="p-4 top-10 text-center">
          <div class="bg-light w-100 cover-image">
            @if (auth()->user()->photo_profile == null)
              <img src="{{ asset('img/profile.png') }}" alt="" class="w-100">
            @else
              <img src="{{ asset('storage/'.auth()->user()->photo_profile) }}" alt="" class="w-100">
            @endif
          </div>
          <span class="text-center fs-small">Admin@gmail.com</span>
        </div>
        
        <div class="top-8">
          <div class="mb-3">
            <a href="/user/dashboard" class="text-decoration-none px-3 fs-normal text-dark"><span class="fa fa-cogs me-1"></span> Dashboard</a>
          </div>
          <div class="mb-3">
            <a href="/user/transaction" class="text-decoration-none px-3 fs-normal text-dark"><span class="fa fa-book me-1"></span> Transactions</a>
          </div>
          <div class="mb-3">
            <a href="/user/change_password" class="text-decoration-none px-3 fs-normal text-dark"><span class="fa fa-lock me-1"></span> Change Password</a>
          </div>
          <div class="mb-3">
            <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal" class="text-decoration-none px-3 fs-normal text-dark"><span class="fa fa-plane me-1"></span> Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>