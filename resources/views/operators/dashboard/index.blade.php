@extends('pages.layouts.main')

@section('content')
<div class="row mb-1">
  <div class="col-md-12 mb-3">
    <a href="/" class="text-decoration-none float-end text-dark"><span class="fa fa-home me-1"></span> Home</a>
    <h5 class="float-start font-semibold">Dashboard</h5>
  </div>

  @include('pages.partials.sidebar')

  <div class="col-md-9 mb-3">
    <div class="card w-100 border-0 rad-10">
      <div class="card-body m-3">
        <h6 class="font-medium">Dahsboard</h6>
        <p class="top-5 color-grey fs-small text-grey font-regular">App / User / <span class="color-primary">Dashboard</span></p>
        
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

        <form action="/user/update" method="post" enctype="multipart/form-data">
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
              <label for="phone_number" class="fs-normal mb-1">Phone Number : </label>
              <input type="text" name="phone_number" class="form-control rad-6 fs-normal @error('phone_number') is-invalid @enderror" placeholder="Phone Number" value="{{ $data->phone }}">
              @error('phone_number')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="gender" class="fs-normal mb-1 @error('gender') is-invalid @enderror">Gender : </label>
              <select name="gender" id="gender" class="form-control rad-6 fs-normal">
                <option value="L" {{ ($data->gender == 'male') ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ ($data->gender == 'female') ? 'selected' : '' }}>Perempuan</option>
                <option value="C" {{ ($data->gender == 'hidden') ? 'selected' : '' }}>Hidden</option>
              </select>
              @error('gender')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="mb-3 row">
            <div class="col-md-6">
              <label for="identity_photo" class="fs-normal mb-1">Identity Photo : </label>
              <input type="file" name="identity_photo" class="form-control rad-6 fs-normal @error('identity_photo') is-invalid @enderror" placeholder="Zip Code" value="{{ $data->user->identity_photo }}">
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
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection