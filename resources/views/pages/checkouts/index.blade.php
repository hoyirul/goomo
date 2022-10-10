@extends('pages.layouts.main')

@section('content')
  <div class="row main mb-1">
    <div class="col-md-12 mb-3">
      <a href="/cart/{{ auth()->user()->id }}/show" class="text-decoration-none float-end text-dark"><span class="fa fa-chevron-left me-1"></span> Back</a>
      <h5 class="float-start font-semibold">{{ $title = 'Checkout - '. now() }}</h5>
    </div>

    @foreach ($carts as $item)
      <div class="col-md-3 mb-3">
        <a href="/cart/{{ $item->book->id }}/edit" class="text-decoration-none text-dark">
          <div class="card w-100 border-0 rad-10">
            <div class="cover p-3">
              <img src="{{ asset('storage/'.$item->book->cover_image) }}" class="card-img-top h-64 w-full object-cover rounded-lg">
            </div>
            <div class="card-body top-20">
              <h6 class="font-medium">{{ $item->book->title }}</h6>
              <p class="top-6 color-grey fs-small text-grey font-regular"><b class="font-medium text-dark">GENRE</b> - {{ strtoupper($item->book->genre->genre) }}</p>
              <span class="float-start text-danger fs-normal mt-1">{{ $item->qty }} x Rp. {{ number_format($item->book->price) }}</span>
              <span class="float-end font-semibold">{{ $item->subtotal / 1000 }}K</span>
            </div>
          </div>
        </a>
      </div>
    @endforeach

    
  </div>

  <h4 class="float-start font-semibold mt-3">Total : Rp. {{ number_format($total) }}.00,-</h4>
  <button type="button" data-bs-toggle="modal" data-bs-target="#checkoutModal" class="btn btn-primary fs-medium p-2 float-end font-medium rad-8 px-5">Check Out</button>
  <br>

  <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content rad-8">
        <div class="modal-header">
          <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/checkout" method="post">
          @csrf
          <div class="modal-body">
            <p class="fs-normal text-center">Are you sure to buy? <br><span class="text-danger">Note : </span> Before checkout please check your order first</p>
            <input type="hidden" name="customer_id" value="{{ $customer->id }}">
            <input type="hidden" name="total" value="{{ $total }}">
            <label for="comments" class="fs-normal mb-1">Comments : </label>
            <textarea name="comments" id="comments" class="form-control rad-8 fs-normal" placeholder="Comments"></textarea>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary rad-8 fs-normal">Checkout Now</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection