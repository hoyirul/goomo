@extends('pages.layouts.main')

@section('content')
<div class="row">
  <div class="col-md-12 mb-3">
    <a href="/" class="text-decoration-none float-end text-dark"><span class="fa fa-chevron-left me-1"></span> Back</a>
    <h5 class="float-start font-semibold">{{ $title }}</h5>
  </div>

  <div class="col-md-4 mb-3 px-3">
    <img src="{{ asset('storage/'.$tables->motorcycle_photo) }}" class="card-img-top w-full object-cover rounded-lg">
  </div>

  <div class="col-md-8 mb-3 px-3">
    <p class="color-star float-end"><span class="fa fa-phone me-2"></span> {{ $tables->user_owner->phone }}</p>
    <h5 class="font-medium">{{ $tables->motorcycle_name.' '.$tables->production_year }}</h5>
    <p class="top-8 color-grey fs-small text-grey font-regular">{{ strtoupper($tables->user_owner->name) }}</p>
    <p class="text-justify text-secondary fs-normal mb-3">
      {{ $tables->description }}
    </p>
    <p class="top-8 color-grey fs-normal text-grey font-regular"><b class="font-medium text-dark">Brand</b> - {{ $tables->motorcycle_brand->brand_name }}</p>
    <p class="top-8 color-grey fs-normal text-grey font-regular"><b class="font-medium text-dark">Type</b> - {{ $tables->motorcycle_type->type_name }}</p>

    @auth
      @if (Auth::user()->role_id == 3)    
        <a href="#" data-bs-toggle="modal" data-bs-target="#bookNow" class="btn btn-sm btn-primary rad-8 px-3 py-2 font-regular float-end"><span class="fa fa-shopping-bag me-1"></span> Book Now</a>
      @endif
    @else 
      <a href="/login" class="btn btn-sm btn-primary rad-8 px-3 py-2 font-regular float-end"><span class="fa fa-shopping-bag me-1"></span> Book Now</a>
    @endauth
    <h5 class="fs-large font-semibold mt-2 float-start">Daily</h5>
  </div>
</div>

<div class="modal fade" id="bookNow" tabindex="-1" aria-labelledby="bookNowLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content rad-8">
      <div class="modal-header">
        <h5 class="modal-title" id="bookNowLabel">Book Now</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/v2/transaction" method="post">
        @csrf
        <div class="modal-body">
          <div>
            <input type="hidden" name="motorcycle_id" value="{{ $tables->id }}">
            <input type="hidden" name="user_owner_id" value="{{ $tables->user_owner_id }}">
            <label for="start_at" class="fs-normal mb-1">Start At : </label>
            <input type="datetime-local" name="start_at" class="form-control rad-8 fs-normal mb-1  @error('start_at') is-invalid @enderror" placeholder="Start At" value="{{ old('start_at') }}">   
            @error('start_at')
              <div class="invalid-feedback ml-1">{{ $message }}</div>
            @enderror
            <label for="end_at" class="fs-normal mb-1">End At : </label>
            <input type="datetime-local" name="end_at" class="form-control rad-8 fs-normal  @error('end_at') is-invalid @enderror" placeholder="Start At" value="{{ old('end_at') }}">   
            @error('end_at')
              <div class="invalid-feedback ml-1">{{ $message }}</div>
            @enderror 
            <label for="information" class="fs-normal mb-1">Information : </label>
            <textarea name="information" id="information" class="form-control rad-8 fs-normal" placeholder="Information"></textarea>

          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary rad-8 fs-normal py-2 p-3">Submit Booking</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection