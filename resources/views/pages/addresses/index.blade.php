@extends('pages.layouts.main')

@section('content')
<div class="row mb-1">
  <div class="col-md-12 mb-3">
    <a href="/v2/address/create" class="text-decoration-none float-end text-dark fs-normal mt-2"><span class="fa fa-plus-circle me-1"></span> Add Address</a>
    <h5 class="float-start font-semibold">{{ $title }}</h5>
  </div>

  @include('pages.partials.sidebar')

  <div class="col-md-9 mb-3">
    <div class="card w-100 border-0 rad-10">
      <div class="card-body m-3">
        <h6 class="font-medium">{{ $title }}</h6>
        <p class="top-5 color-grey fs-small text-grey font-regular">App / User / <span class="color-primary">Transactions</span></p>
        
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

        <table class="table fs-normal table-striped table-hover">
          <thead>
            <tr>
              <th scope="col" class="text-center">#</th>
              <th scope="col">Province</th>
              <th scope="col">City</th>
              <th scope="col">Districts</th>
              <th scope="col">Ward</th>
              <th scope="col" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tables as $item)
              <tr>
                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                <td>{{ $item->address->province }}</td>
                <td>{{ $item->address->city }}</td>
                <td>{{ $item->address->districts }}</td>
                <td>{{ $item->address->ward }}</td>
                <td class="text-center">
                  <form action="/v2/address/{{ $item->id }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data?')" method="post">
                    @csrf
                    @method('DELETE')
  
                    <a href="/v2/address/{{ $item->id }}/edit" class="badge bg-badge-info color-info rad-6 fs-small text-decoration-none">
                      <span class="fa fa-fw fa-syringe mx-1"></span>
                      Edit
                    </a>
  
                    <button type="submit" class="badge bg-badge-danger text-danger rad-6 fs-small border-0">
                      <span class="fa fa-fw fa-trash mx-1"></span>
                    Hapus
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection