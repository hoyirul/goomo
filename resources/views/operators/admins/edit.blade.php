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
      <a href="/u/author" class="btn btn-primary mx-2 py-2 shadow-sm fs-normal align-self-center px-3 mt-n3">
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
        <form method="post" action="{{ url('/operator/admin-update/'.$data->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3 row">
            <div class="col-md-6">
              <label for="email" class="fs-normal mb-1">Email : </label>
              <input type="email" name="email" class="form-control rad-6 fs-normal @error('email') is-invalid @enderror" placeholder="Email" readonly value="{{ $data->user->email }}">
              @error('email')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="name" class="fs-normal mb-1">Full Name : </label>
              <input type="text" name="name" class="form-control rad-6 fs-normal @error('name') is-invalid @enderror" placeholder="Full Name" value="{{ $data->name }}">
              @error('name')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>
  
          <div class="mb-3 row">
            <div class="col-md-6">
              <label for="phone" class="fs-normal mb-1">Phone Number : </label>
              <input type="text" id="phone" name="phone" class="form-control rad-6 fs-normal @error('phone_number') is-invalid @enderror" placeholder="Phone Number" value="{{ $data->phone }}">
              @error('phone_number')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="gender" class="fs-normal mb-1 @error('gender') is-invalid @enderror">Gender : </label>
              <select name="gender" id="gender" class="form-control rad-6 fs-normal">
                <option value="male" {{ ($data->gender == 'male') ? 'selected' : '' }}>Laki-laki</option>
                <option value="female" {{ ($data->gender == 'female') ? 'selected' : '' }}>Perempuan</option>
                <option value="hidden" {{ ($data->gender == 'hidden') ? 'selected' : '' }}>Hidden</option>
              </select>
              @error('gender')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>
  
          <div class="mb-3 row">
            <div class="col-md-6">
              <label for="identity_photo" class="fs-normal mb-1">Identity Photo : </label>
              <input type="file" name="identity_photo" id="identity_photo" class="form-control rad-6 fs-normal @error('identity_photo') is-invalid @enderror" placeholder="Zip Code" value="{{ $data->user->identity_photo }}">
              @if ($data->identity_photo == NULL)
                <span class="text-danger fs-small">You haven't uploaded the ID Card (KTP) *</span>
              @endif
              @error('identity_photo')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="driver_license" class="fs-normal mb-1">Driver License : </label>
              <input type="file" name="driver_license" class="form-control rad-6 fs-normal @error('driver_license') is-invalid @enderror" placeholder="driver_license" value="{{ Auth::user()->driver_license }}">
              @if ($data->driver_lisence == NULL)
                <span class="text-danger fs-small">You haven't uploaded the SIM Card *</span>
              @endif
              @error('driver_license')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>
  
          <div class="mb-3 row">
            <div class="col-md-6">
              <label for="selfie_photo" class="fs-normal mb-1">Selfie Photo : </label>
              <input type="file" name="selfie_photo" class="form-control rad-6 fs-normal @error('selfie_photo') is-invalid @enderror" placeholder="Selfie Photo" value="{{ $data->selfie_photo }}">
              @if ($data->selfie_photo == NULL)
                <span class="text-danger fs-small">You haven't uploaded the selfie with ID Card *</span>
              @endif
              @error('selfie_photo')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="image" class="fs-normal mb-1">Photo : </label>
              <input type="file" name="image" class="form-control rad-6 fs-normal @error('image') is-invalid @enderror" placeholder="image" value="{{ Auth::user()->image }}">
              @error('image')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>
  
          <div class="mb-3">
            <button type="submit" class="btn btn-primary fs-normal px-5 float-end py-2 rad-6">Update</button>
         </form>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
@endsection