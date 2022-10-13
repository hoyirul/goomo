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
      <h5 class="mb-3 font-semibold float-start mt-2">{{ $title }}</h5>
      <a href="#" data-bs-toggle="modal" data-bs-target="#filterModal" class="btn btn-primary text-white rad-8 fs-normal py-2 mb-3 text-decoration-none float-end px-3"><span class="fa fa-filter me-1"></span> Filter</a>
    </div>
    @foreach ($tables as $item)
      <div class="col-md-4 mb-3">
        <a href="/motorcycle/{{ $item->id }}/show" class="text-decoration-none text-dark">
          <div class="card w-100 border-0 rad-10">
            <div class="cover p-3">
              <img src="{{ asset('storage/'.$item->motorcycle_photo) }}" class="card-img-top h-64 w-full object-cover rounded-lg">
            </div>
            <div class="card-body top-20">
              <h6 class="font-medium">{{ $item->motorcycle_name.' '.$item->production_year }}</h6>
              <p class="top-6 color-grey fs-small text-grey font-regular"><b class="font-medium text-dark">{{ strtoupper($item->motorcycle_type->type_name) }}</b> - {{ strtoupper($item->motorcycle_brand->brand_name) }}</p>
              <span class="color-star float-start"><span class="fa fa-phone me-2"></span> {{ $item->user_owner->phone }}</span>
              <span class="float-end font-semibold">Daily</span>
            </div>
          </div>
        </a>
      </div>
    @endforeach
    
    {!! $tables->links() !!}
  </div>

  @include('pages.partials.filter')
@endsection