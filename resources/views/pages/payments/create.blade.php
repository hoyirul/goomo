@extends('pages.layouts.main')

@section('content')
<div class="row mb-1">
  <div class="col-md-12 mb-3">
    <a href="/v2/transaction" class="text-decoration-none float-end text-dark"><span class="fa fa-arrow-left me-1"></span> Back</a>
    <h5 class="float-start font-semibold">{{ $title }}</h5>
  </div>

  @include('pages.partials.sidebar')

  <div class="col-md-9 mb-3">
    <div class="card w-100 border-0 rad-10">
      <div class="card-body m-3">
        <h6 class="font-medium">{{ $title }} {{ $tables->txid }}</h6>
        <p class="top-5 color-grey fs-small text-grey font-regular">App / User / {{ $title }}<span class="color-primary"> / {{ $tables->txid }}</span></p>
        
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

        <form method="post" action="/v2/payment" enctype="multipart/form-data">
          @csrf

          <div class="mb-3 row">
            <div class="col-md-6">
              <label for="name" class="fs-normal mb-1">User Customer : </label>
              <input type="hidden" name="txid" value="{{ $tables->txid }}">
              <input type="name" name="name" readonly class="form-control rad-6 fs-normal @error('name') is-invalid @enderror" value="{{ $tables->user_customer->name }}" placeholder="Motorcycle Name">
              @error('name')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="motorcycle_name" class="fs-normal mb-1">Motorcycle : </label>
              <input type="text" name="motorcycle_name" readonly class="form-control rad-6 fs-normal @error('motorcycle_name') is-invalid @enderror" placeholder="Motorcycle" value="{{ $tables->motorcycle->motorcycle_name }}">
              @error('motorcycle_name')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="mb-3 row">
            <div class="col-md-5">
              <label for="start_at" class="fs-normal mb-1">Start At : </label>
              <input type="text" name="start_at" readonly class="form-control rad-6 fs-normal @error('start_at') is-invalid @enderror" value="{{ $tables->start_at }}" placeholder="Motorcycle Start At">
              @error('start_at')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-5">
              <label for="end_at" class="fs-normal mb-1">End At : </label>
              <input type="text" name="end_at" readonly class="form-control rad-6 fs-normal @error('end_at') is-invalid @enderror" placeholder="End At" value="{{ $tables->end_at }}">
              @error('end_at')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-2">
              <label for="during" class="fs-normal mb-1">During : </label>
              <input type="text" name="during" readonly class="form-control rad-6 fs-normal @error('during') is-invalid @enderror" placeholder="End At" value="{{ $days->d }} Days">
              @error('during')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="mb-3 row">
            <div class="col-md-4">
              <label for="motorcycle_brand" class="fs-normal mb-1">Brand : </label>
              <input type="text" name="motorcycle_brand" readonly class="form-control rad-6 fs-normal @error('motorcycle_brand') is-invalid @enderror" value="{{ $tables->motorcycle->motorcycle_brand->brand_name }}" placeholder="Motorcycle Brand">
              @error('motorcycle_brand')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="motorcycle_type" class="fs-normal mb-1">Type : </label>
              <input type="text" name="motorcycle_type" readonly class="form-control rad-6 fs-normal @error('motorcycle_type') is-invalid @enderror" placeholder="Motorcycle Type" value="{{ $tables->motorcycle->motorcycle_type->type_name }}">
              @error('motorcycle_type')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="police_number" class="fs-normal mb-1">PN : </label>
              <input type="text" name="police_number" readonly class="form-control rad-6 fs-normal @error('police_number') is-invalid @enderror" placeholder="Police Number" value="{{ $tables->motorcycle->police_number }}">
              @error('police_number')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="mb-3 row">
            <div class="col-md-4">
              <label for="motorcycle_brand" class="fs-normal mb-1">Owner : </label>
              <input type="text" name="motorcycle_brand" readonly class="form-control rad-6 fs-normal @error('motorcycle_brand') is-invalid @enderror" value="{{ $tables->motorcycle->user_owner->name }}" placeholder="Motorcycle Brand">
              @error('motorcycle_brand')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="phone" class="fs-normal mb-1">Owner Phone : </label>
              <input type="text" name="phone" readonly class="form-control rad-6 fs-normal @error('phone') is-invalid @enderror" placeholder="Motorcycle Type" value="{{ $tables->motorcycle->user_owner->phone }}">
              @error('phone')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="police_number" class="fs-normal mb-1">Vehicle Registration : </label>
              <a href="{{ asset('storage/'.$tables->motorcycle->vehicle_registration) }}" target="_blank" class="btn btn-success form-control rad-6 fs-normal">{{ 'View (STNK)' }}</a>
            </div>
          </div>

          <div class="mb-3 row">
            <div class="col-md-4">
              <label for="total" class="fs-normal mb-1">Total : </label>
              <input type="text" name="total" readonly class="form-control rad-6 fs-normal @error('total') is-invalid @enderror" value="{{ $tables->total }}" placeholder="Motorcycle Brand">
              @error('total')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="pay" class="fs-normal mb-1">Pay : </label>
              <input type="text" name="pay" class="form-control rad-6 fs-normal @error('pay') is-invalid @enderror" placeholder="Ex. 1500000" value="{{ old('pay') }}">
              @error('pay')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="evidence_of_transfer" class="fs-normal mb-1">Evidence of Transfer : </label>
              <input type="file" name="evidence_of_transfer" class="form-control rad-6 fs-normal @error('evidence_of_transfer') is-invalid @enderror" placeholder="Motorcycle Type">
              @error('evidence_of_transfer')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="mb-3">
            <button type="submit" class="btn btn-primary fs-normal px-5 float-end py-2 rad-6">Pay Now</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection