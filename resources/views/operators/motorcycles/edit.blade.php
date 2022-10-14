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
      <a href="/operator/motorcycle" class="btn btn-primary mx-2 py-2 shadow-sm fs-normal align-self-center px-3 mt-n3">
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
         <form method="post" action="{{ url('/operator/motorcycle-update/'.$tables->id) }}" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div>
            <div class="mb-3 row">
              <div class="col-md-6">
                <label for="user_owner_id" class="fs-normal mb-1">Owner : </label>
                <select id="user_owner_id" name="user_owner_id" placeholder="Owner" class="form-control-select fs-normal form-spacer-10x8 @error('user_owner_id') is-invalid @enderror" data-toggle="tooltip" data-placement="right">
                @foreach ($owners as $owner) 
                  <option value="{{ $owner->id }}" {{ ($tables->user_owner_id == $owner->id) ? 'selected' : '' }}>{{ $owner->name }}</option>
                @endforeach  
                </select>
                @error('name')
                  <div class="invalid-feedback ml-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="motorcycle_name" class="fs-normal mb-1">Motorcycle Name: </label>
                <input type="text" name="motorcycle_name"  class="form-control rad-6 fs-normal @error('motorcycle_name') is-invalid @enderror" placeholder="Motorcycle" value="{{ $tables->motorcycle_name }}">
                @error('motorcycle_name')
                  <div class="invalid-feedback ml-1">{{ $message }}</div>
                @enderror
              </div>
            </div>
  
            <div class="mb-3 row">
              <div class="col-md-3">
                <label for="motorcycle_brand_id" class="fs-normal mb-1">Brand : </label>
                <select id="motorcycle_brand_id" name="motorcycle_brand_id" placeholder="Owner" class="form-control-select fs-normal form-spacer-10x8 @error('motorcycle_brand_id') is-invalid @enderror" data-toggle="tooltip" data-placement="right">
                @foreach ($brands as $brand) 
                  <option value="{{ $brand->id }}" {{ ($tables->motorcycle_brand_id == $brand->id) ? 'selected' : '' }}>{{ $brand->brand_name }}</option>
                @endforeach
                </select>
                @error('motorcycle_brand')
                  <div class="invalid-feedback ml-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="motorcycle_type_id" class="fs-normal mb-1">Type : </label>
                <select id="motorcycle_type_id" name="motorcycle_type_id" placeholder="Owner" class="form-control-select fs-normal form-spacer-10x8 @error('motorcycle_type_id') is-invalid @enderror" data-toggle="tooltip" data-placement="right">
                @foreach ($types as $type)
                  <option value="{{ $type->id }}" {{ ($tables->motorcycle_type_id == $type->id) ? 'selected' : '' }}>{{ $type->type_name }}</option>
                @endforeach
                </select>
                @error('motorcycle_type')
                  <div class="invalid-feedback ml-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="production_year" class="fs-normal mb-1">Publish Date : </label>
                <input type="text" name="production_year"  class="form-control rad-6 fs-normal @error('production_year') is-invalid @enderror" placeholder="production year" value="{{ $tables->production_year }}">
                @error('production_year')
                  <div class="invalid-feedback ml-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="police_number" class="fs-normal mb-1">PN : </label>
                <input type="text" name="police_number"  class="form-control rad-6 fs-normal @error('police_number') is-invalid @enderror" placeholder="Police Number" value="{{ $tables->police_number }}">
                @error('police_number')
                  <div class="invalid-feedback ml-1">{{ $message }}</div>
                @enderror
              </div>
            </div>
  
            <div class="mb-3 row">
              <div class="col-md-6">
                <label for="vehicle_registration" class="fs-normal mb-1">Vehicle Regristration : </label>
                <input type="file" name="vehicle_registration" id="vehicle_registration" class="form-control rad-6 fs-normal @error('vehicle_registration') is-invalid @enderror" placeholder="Zip Code" value="{{ $tables->vehicle_registration }}">
                @if ($tables->vehicle_registration == NULL)
                  <span class="text-danger fs-small">You haven't uploaded the Vehicle Regristration *</span>
                @endif
                @error('vehicle_registration')
                  <div class="invalid-feedback ml-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="motorcycle_photo" class="fs-normal mb-1">Motorcycle Photo : </label>
                <input type="file" name="motorcycle_photo" id="motorcycle_photo" class="form-control rad-6 fs-normal @error('motorcycle_photo') is-invalid @enderror" placeholder="Zip Code" value="{{ $tables->motorcycle_photo }}">
                @if ($tables->motorcycle_photo == NULL)
                  <span class="text-danger fs-small">You haven't uploaded the Motorcycle Photo *</span>
                @endif
                @error('motorcycle_photo')
                  <div class="invalid-feedback ml-1">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="mb-3 row">
              <div class="col-md-3">
                <label for="status" class="fs-normal mb-1 @error('status') is-invalid @enderror"> Status : </label>
                <select name="status" id="status" class="form-control rad-6 fs-normal">
                  <option value="inactive" {{ ($tables->status == 'inactive') ? 'selected' : '' }}>Inactive</option>
                  <option value="active" {{ ($tables->status == 'active') ? 'selected' : '' }}>Active</option>
                </select>
                @error('status')
                  <div class="invalid-feedback ml-1">{{ $message }}</div>
                @enderror
              </div>
            </div>
            
         
          <button type="submit" data-id="btnUpdateAuthor" class="btn btn-primary font-medium float-right py-2 px-5">Update</button>
         </form>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
@endsection