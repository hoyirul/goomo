@extends('operators.layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container fs-normal">

   <!-- Page Heading -->
   <p class="mb-3">Tabel / Data / <span class="color-primary">{{ $title }}</span></p>
  <div class="row">
    <div class="col-md-6">
      <h5 class="m-0 font-weight-bold color-primary mb-2">Tambah {{ $title }}</h5>
      <p class="mb-4">Hati-hati dalam input data. Beberapa data tidak dapat diubah setelah diinput!.</p>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
      <a href="/operator/motorcyclebrand" class="btn btn-primary mx-2 py-2 shadow-sm fs-normal align-self-center px-3 mt-n3">
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
   <div class="card shadow mb-4 border-0">
      <div class="card-header bg-white py-3">
         <h6 class="m-0 font-weight-bold color-primary">Data {{ $title }}</h6>
      </div>
      <div class="card-body container-fluid">
         <form method="post" action="/operator/motorcyclebrand-update/{{ $data->id }}">
          @method('PUT')
          @csrf
          <div class="col-md-6">
            <label for="name" class="fs-normal mb-1">Brand Name : </label>
            <input type="text" name="name" class="form-control rad-6 fs-normal @error('name') is-invalid @enderror" placeholder="Full Name" value="{{ $data->brand_name }}">
            @error('name')
              <div class="invalid-feedback ml-1">{{ $message }}</div>
            @enderror
          </div>
         
          <button type="submit" data-id="btnUpdateAuthor" class="btn btn-primary font-medium float-right py-2 px-5">Update</button>
         </form>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
@endsection