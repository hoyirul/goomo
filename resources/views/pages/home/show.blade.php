@extends('pages.layouts.main')

@section('content')
<div class="row">
  <div class="col-md-12 mb-3">
    <a href="/" class="text-decoration-none float-end text-dark"><span class="fa fa-chevron-left me-1"></span> Back</a>
    <h5 class="float-start font-semibold">{{ $title = 'Detail Item' }}</h5>
  </div>

  <div class="col-md-4 mb-3 px-3">
    <img src="{{ asset('storage/'.$books->cover_image) }}" class="card-img-top w-full object-cover rounded-lg">
  </div>

  <div class="col-md-8 mb-3 px-3">
    <p class="color-star float-end"><span class="fa fa-star me-2"></span> {{ number_format((float) $books->rating, 2, '.', '') }}</p>
    <h5 class="font-medium">{{ $books->title }}</h5>
    <p class="top-8 color-grey fs-small text-grey font-regular">{{ strtoupper($books->genre->genre) }}</p>
    <p class="text-justify text-secondary fs-normal mb-3">
      {{ $books->description }}
    </p>
    <p class="top-8 color-grey fs-normal text-grey font-regular"><b class="font-medium text-dark">Author</b> - {{ $books->author->name }}</p>
    <p class="top-8 color-grey fs-normal text-grey font-regular"><b class="font-medium text-dark">Publisher</b> - {{ $books->publisher->name }}</p>

    @auth
      <a href="#" data-bs-toggle="modal" data-bs-target="#addCartModal" class="btn btn-sm btn-primary rad-8 px-3 py-2 font-regular float-end"><span class="fa fa-shopping-bag me-1"></span> Add to Cart</a>
    @else
      <a href="/login" class="btn btn-sm btn-primary rad-8 px-3 py-2 font-regular float-end"><span class="fa fa-shopping-bag me-1"></span> Add to Cart</a>
    @endauth
    <h5 class="fs-large font-semibold mt-2 float-start">Rp. {{ number_format($books->price) }}</h5>
  </div>
</div>

<div class="modal fade" id="addCartModal" tabindex="-1" aria-labelledby="addCartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content rad-8">
      <div class="modal-header">
        <h5 class="modal-title" id="addCartModalLabel">Add to Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/cart/{{ $books->id }}/add" method="post">
        @csrf
        <div class="modal-body">
          <div>
            <input type="hidden" name="customer_id" value="{{ $customer->id }}">
            <input type="hidden" name="price" value="{{ $books->price }}">
            <input type="number" name="qty" class="form-control rad-8 fs-normal" placeholder="Quantity" value="{{ old('qty') }}">    
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary rad-8 fs-normal">Add to Cart</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection