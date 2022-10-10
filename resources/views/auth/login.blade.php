@extends('auth.layouts.main')

@section('content')

  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="p-3"></div>
              <div class="card shadow-sm border-0 rounded-lg mt-5 rad-20">
                <div class="card-body m-3">
                  <h3 class="text-center font-weight-light my-4 mb-5 color-primary font-semibold" data-id="title">BookStore*</h3>
                  <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3 fs-normal">
                      <label for="email" data-id="lblEmail">Email address</label>
                      <input id="email" data-id="inputEmail" type="email" class="form-control form-spacer-25x20 rad-10 fs-normal @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-floating mb-3 fs-normal">
                      <label for="password" data-id="lblPassword">Password</label>
                      <input id="password" type="password" data-id="inputPassword" class="form-control rad-10 form-spacer-25x20 fs-normal @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Password">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-check mb-3 fs-normal">
                      <input class="form-check-input" name="remember" id="inputRememberPassword" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                      <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                      
                      <a class="small color-primary text-decoration-none" href="/">
                          <span class="fas fa-arrow-left px-2"></span>
                          {{ __('Kembali') }}
                      </a>
                      
                      <button type="submit" data-id="btnLogin" class="btn btn-primary py-2 px-5 rad-10 font-medium">
                          {{ __('Login') }}
                      </button>
                    </div>
                    <div class="p-3"></div>
                    <p class="fs-normal text-center">Belum punya akun? <a href="/register">Register</a></p>
                  </form>
                {{-- </div> --}}
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>

  </div>

@endsection