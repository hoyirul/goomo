<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
  <div class="container-fluid">
    <a class="navbar-brand font-bold fs-extralarge" href="#">
        Book Store
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      </ul>
      <div class="d-flex">
        @auth
          @if (auth()->user()->role == 'admin')
            <a href="/u/dashboard" class="rad-8 btn btn-dark btn-sm fs-normal font-regular p-2 px-5 float-end"><span class="fa fa-cogs me-1"></span> Dashboard</a>   
          @else
            <a href="/user/dashboard" class="rad-8 btn btn-primary btn-sm fs-normal font-regular p-2 px-5 float-end me-2"><span class="fa fa-cogs me-1"></span> Dashboard</a>            
            <a href="/cart/{{ auth()->user()->id }}/show" class="rad-8 btn btn-dark btn-sm position-relative fs-normal font-regular p-2 px-5 float-end me-2"><span class="fa fa-shopping-bag me-1"></span> Carts
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                @if (App\Http\Controllers\User\CartController::cart_count(auth()->user()->id) > 9)
                  9+
                @else
                  {{ App\Http\Controllers\User\CartController::cart_count(auth()->user()->id) }}
                @endif
                <span class="visually-hidden">Count Items</span>
              </span>
            </a>
          @endif
        @else
          <a href="/login" class="rad-8 btn btn-primary btn-sm fs-normal font-regular p-2 px-5 float-end me-2" data-id="btnToLogin">Sign In</a>
          <a href="/register" class="rad-8 btn btn-dark btn-sm fs-normal font-regular p-2 px-5 float-end">Sign Up</a>            
        @endauth
      </div>
    </div>
  </div>
</nav>
<div class="mb-3"></div>