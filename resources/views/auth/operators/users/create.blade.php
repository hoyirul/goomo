@extends('admin.layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container fs-normal">
  <!-- Page Heading -->
  <p class="mb-3">Tabel / Data / <span class="color-primary">{{ $title }}</span></p>
  <div class="row">
    <div class="col-md-6">
      <h5 class="m-0 font-weight-bold color-primary mb-2">Tambah Data {{ $title }}</h5>
      <p class="mb-4">Hati-hati dalam input data. Tolong di perhatikan dengan teliti!.</p>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
      <a href="/u/admins" class="btn btn-primary mx-2 py-2 shadow-sm fs-normal align-self-center px-3 mt-n3">
        <span class="fas fa-arrow-left"></span> Kembali</a>
    </div>
  </div>
  <!-- DataTales Example -->
  <div class="card border-0 shadow mb-4">
    <div class="card-header bg-white py-3">
      <h6 class="m-0 font-weight-bold color-primary">Data {{ $title }}</h6>
    </div>
    <div class="card-body container-fluid">
      <form method="post" action="{{ url('/u/users') }}">
        @csrf
        <div class="row">
          <div class="col-xl-6 mr-auto">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" placeholder="Email" class="form-control fs-normal form-spacer-20x15 @error('email') is-invalid @enderror" id="email" name="email" data-toggle="tooltip" data-placement="right" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" placeholder="Password" class="form-control fs-normal form-spacer-20x15 @error('password') is-invalid @enderror" id="password" name="password" data-toggle="tooltip" data-placement="right" value="{{ old('password') }}">
              @error('password')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password_confirmation">Konfirmasi Password</label>
              <input type="password" placeholder="Konfirmasi Password" class="form-control fs-normal form-spacer-20x15 @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" data-toggle="tooltip" data-placement="right" value="{{ old('password_confirmation') }}">
              @error('password_confirmation')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="role">Role</label>
              <input type="text" placeholder="Role" readonly class="form-control fs-normal form-spacer-20x15 @error('role') is-invalid @enderror" id="role" name="role" data-toggle="tooltip" data-placement="right"  value="{{ 'admin' }}">
              @error('role')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-xl-6 ml-auto">
            <div class="form-group">
              <label for="name">Nama Lengkap</label>
              <input type="text" placeholder="Nama Lengkap" class="form-control fs-normal form-spacer-20x15 @error('name') is-invalid @enderror" id="name" name="name" data-toggle="tooltip" data-placement="right"  value="{{ old('name') }}">
              @error('name')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="phone_number">No Telp</label>
                  <input type="text" placeholder="No Telepon" class="form-control fs-normal form-spacer-20x15 @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" data-toggle="tooltip" data-placement="right" value="{{ old('phone_number') }}">
                  @error('phone_number')
                  <div class="invalid-feedback ml-1">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                  <select id="jenis_kelamin" name="jenis_kelamin" placeholder="Nama Bayi" class="form-control-select fs-normal form-spacer-10x8 @error('jenis_kelamin') is-invalid @enderror" data-toggle="tooltip" data-placement="right" title="Golongan Darah Bayi">
                    <option value="1" {{ (old('jenis_kelamin') == 1) ? 'selected' : '' }}>Laki-laki</option>
                    <option value="2" {{ (old('jenis_kelamin') == 2) ? 'selected' : '' }}>Perempuan</option>
                  </select>
                  @error('jenis_kelamin')
                    <div class="invalid-feedback ml-1">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <label for="zip_code">Kode Pos</label>
              <input type="text" placeholder="Kode Pos" class="form-control fs-normal form-spacer-20x15 @error('zip_code') is-invalid @enderror" id="zip_code" name="zip_code" data-toggle="tooltip" data-placement="right" value="{{ old('zip_code') }}">
              @error('zip_code')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" placeholder="Alamat" class="form-control fs-normal form-spacer-20x15 @error('address') is-invalid @enderror" id="address" name="address" data-toggle="tooltip" data-placement="right" value="{{ old('address') }}">
                @error('address')
                  <div class="invalid-feedback ml-1">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          
        </div>

        <button type="submit" class="btn py-2 px-5 float-right font-medium btn-primary">Tambah</button>
            
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection