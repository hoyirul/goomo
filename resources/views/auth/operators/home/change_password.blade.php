@extends('admin.layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container fs-normal">
  <!-- Page Heading -->
  <p class="mb-3">Tabel / Data / <span class="color-primary">{{ $title }}</span></p>
  <div class="row">
    <div class="col-md-6">
      <h5 class="m-0 font-weight-bold color-primary mb-2">{{ $title }}</h5>
      <p class="mb-4">Hati-hati dalam input data. Tolong di perhatikan dengan teliti!.</p>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
      <a href="/u/dashboard" class="btn btn-primary mx-2 py-2 shadow-sm fs-normal align-self-center px-3 mt-n3">
        <span class="fas fa-arrow-left"></span> Kembali</a>
    </div>
  </div>

  @if(session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
  @endif

  @if(session('danger'))
    <div class="alert alert-danger">
      {{session('danger')}}
    </div>
  @endif

  <!-- DataTales Example -->
  <div class="card border-0 shadow mb-4">
    <div class="card-header bg-white py-3">
      <h6 class="m-0 font-weight-bold color-primary">{{ $title }}</h6>
    </div>
    <div class="card-body container-fluid">
      <form method="post" action="/u/update_password">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-xl-6 mr-auto">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" readonly placeholder="Email" class="form-control fs-normal form-spacer-20x15 @error('email') is-invalid @enderror" id="email" name="email" data-toggle="tooltip" data-placement="right" value="{{ $user->user->email }}">
              @error('email')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">New Password</label>
              <input type="password" placeholder="Password" class="form-control fs-normal form-spacer-20x15 @error('password') is-invalid @enderror" id="password" name="password" data-toggle="tooltip" data-placement="right">
              @error('password')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="col-xl-6 ml-auto">
            <div class="form-group">
              <label for="name">Nama Lengkap</label>
              <input type="text" readonly placeholder="Nama Lengkap" class="form-control fs-normal form-spacer-20x15 @error('name') is-invalid @enderror" id="name" name="name" data-toggle="tooltip" data-placement="right"  value="{{ $user->name }}">
              @error('name')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password_confirmation">Konfirmasi Password</label>
              <input type="password" placeholder="Konfirmasi Password" class="form-control fs-normal form-spacer-20x15 @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" data-toggle="tooltip" data-placement="right">
              @error('password_confirmation')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            
          </div>
        </div>

        <button type="submit" class="btn py-2 px-5 float-right font-medium btn-primary">Change Password</button>
            
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection