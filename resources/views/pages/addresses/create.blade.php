@extends('pages.layouts.main')

@section('content')
<div class="row mb-1">
  <div class="col-md-12 mb-3">
    <a href="/v2/address" class="text-decoration-none float-end text-dark"><span class="fa fa-arrow-left me-1"></span> Back</a>
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

        <form action="/v2/address" method="post">
          @csrf
          
          <div class="mb-3 row">
            <div class="col-md-6">
              <label for="province" class="fs-normal mb-1">Province : </label>
              <input type="province" name="province" class="form-control rad-6 fs-normal" placeholder="Province">
              @error('province')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="city" class="fs-normal mb-1">City : </label>
              <input type="text" name="city" class="form-control rad-6 fs-normal" placeholder="City">
              @error('city')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="mb-3 row">
            <div class="col-md-6">
              <label for="districts" class="fs-normal mb-1">Districts : </label>
              <input type="districts" name="districts" class="form-control rad-6 fs-normal" placeholder="Districts">
              @error('districts')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="ward" class="fs-normal mb-1">Ward : </label>
              <input type="text" name="ward" class="form-control rad-6 fs-normal" placeholder="Ward">
              @error('ward')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
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