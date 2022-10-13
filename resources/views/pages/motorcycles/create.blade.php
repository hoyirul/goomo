@extends('pages.layouts.main')

@section('content')
<div class="row mb-1">
  <div class="col-md-12 mb-3">
    <a href="/v2/motorcycle" class="text-decoration-none float-end text-dark"><span class="fa fa-arrow-left me-1"></span> Back</a>
    <h5 class="float-start font-semibold">{{ $title }}</h5>
  </div>

  @include('pages.partials.sidebar')

  <div class="col-md-9 mb-3">
    <div class="card w-100 border-0 rad-10">
      <div class="card-body m-3">
        <h6 class="font-medium">{{ $title }}</h6>
        <p class="top-5 color-grey fs-small text-grey font-regular">App / User / <span class="color-primary">{{ $title }}</span></p>
        
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

        <form method="post" action="{{ url('/v2/motorcycle') }}" enctype="multipart/form-data">
          @csrf
          <div class="mb-3 row">
            <div class="col-md-6">
              <label for="motorcycle_name" class="fs-normal mb-1">Nama Motor : </label>
              <input type="motorcycle_name" name="motorcycle_name" class="form-control rad-6 fs-normal @error('motorcycle_name') is-invalid @enderror" placeholder="Motorcycle Name">
              @error('motorcycle_name')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="production_year" class="fs-normal mb-1">Production Year : </label>
              <input type="text" name="production_year" class="form-control rad-6 fs-normal @error('producttion_year') is-invalid @enderror" placeholder="Production Year">
              @error('production_year')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="mb-3 row">
            <div class="col-md-6">
              <label for="motorcycle_type_id" class="fs-normal mb-1">Type : </label>
              <select name="motorcycle_type_id" id="motorcycle_type_id" class="form-control rad-6 fs-normal @error('motorcycle_type_id') is-invalid @enderror">
                @foreach ($types as $item)
                  <option value="{{ $item->id }}">{{ $item->type_name }}</option>
                @endforeach
              </select>
              @error('motorcycle_type_id')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="motorcycle_brand_id" class="fs-normal mb-1">Type : </label>
              <select name="motorcycle_brand_id" id="motorcycle_brand_id" class="form-control rad-6 fs-normal @error('motorcycle_brand_id') is-invalid @enderror">
                @foreach ($brands as $item)
                  <option value="{{ $item->id }}">{{ $item->brand_name }}</option>
                @endforeach
              </select>
              @error('motorcycle_brand_id')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="mb-3 row">
            <div class="col-md-6">
              <label for="police_number" class="fs-normal mb-1">Police Number : </label>
              <input type="police_number" name="police_number" class="form-control rad-6 fs-normal" placeholder="Police Number">
            </div>
            <div class="col-md-6">
              <label for="motorcycle_photo" class="fs-normal mb-1"> Motorcyle Photo : </label>
              <input type="file" name="motorcycle_photo" class="form-control rad-6 fs-normal" placeholder="Motorcycle Photo">
            </div>
          </div>

          <div class="mb-3 row">
            <div class="col-md-12">
              <label for="vehicle_registration" class="fs-normal mb-1"> Vehicle Registration : </label>
              <input type="file" name="vehicle_registration" class="form-control rad-6 fs-normal" placeholder="Vehicle">
            </div>
          </div>

          <div class="mb-3 row">
            <div class="col-md-12">
              <label for="description" class="fs-normal mb-1"> Description : </label>
              <textarea name="description" id="description" class="form-control rad-6 fs-normal" placeholder="Description"></textarea>
            </div>
          </div>

          <div class="mb-3">
            <button type="submit" class="btn btn-primary fs-normal px-5 float-end py-2 rad-6">Submit</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection