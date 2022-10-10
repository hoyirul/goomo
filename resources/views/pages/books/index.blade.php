@extends('pages.layouts.main')

@section('content')
<div class="row main">
  
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

    <div class="col-md-12">
      <h5 class="mb-3 font-semibold float-start mt-2">{{ $title = 'Books' }}</h5>
      <a href="#" data-bs-toggle="modal" data-bs-target="#filterModal" class="btn btn-primary text-white rad-8 fs-normal py-2 mb-3 text-decoration-none float-end px-3"><span class="fa fa-filter me-1"></span> Filter</a>
    </div>
    @foreach ($books as $item)
      <div class="col-md-3 mb-3">
        <a href="/book/{{ $item->id }}/show" class="text-decoration-none text-dark">
          <div class="card w-100 border-0 rad-10">
            <div class="cover p-3">
              <img src="{{ asset('storage/'.$item->cover_image) }}" class="card-img-top h-64 w-full object-cover rounded-lg">
            </div>
            <div class="card-body top-20">
              <h6 class="font-medium">{{ $item->title }}</h6>
              <p class="top-6 color-grey fs-small text-grey font-regular"><b class="font-medium text-dark">GENRE</b> - {{ strtoupper($item->genre->genre) }}</p>
              <span class="color-star float-start"><span class="fa fa-star me-2"></span> {{ number_format((float)$item->rating, 2, '.', '') }}</span>
              <span class="float-end font-semibold">{{ $item->price / 1000 }}K</span>
            </div>
          </div>
        </a>
      </div>
    @endforeach
    
    {{-- {!! $books->links() !!} --}}
  </div>

  @include('pages.partials.filter')
@endsection