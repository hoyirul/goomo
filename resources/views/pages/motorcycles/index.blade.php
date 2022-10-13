@extends('pages.layouts.main')

@section('content')
<div class="row mb-1">
  <div class="col-md-12 mb-3">
    <a href="/v2/motorcycle/create" class="text-decoration-none float-end text-dark fs-normal mt-2"><span class="fa fa-plus-circle me-1"></span> Add Motorcycle</a>
    <h5 class="float-start font-semibold">{{ $title }}</h5>
  </div>

  @include('pages.partials.sidebar')

  <div class="col-md-9 mb-3">
    <div class="card w-100 border-0 rad-10">
      <div class="card-body m-3">
        
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

        <h6 class="font-medium">{{ $title }}</h6>
        <p class="top-5 float-start color-grey fs-small text-grey font-regular">App / User / <span class="color-primary">{{ $title }}</span></p>

        <table class="table fs-normal table-striped table-hover">
          <thead>
            <tr>
              <th scope="col" class="text-center">#</th>
              <th scope="col">Name</th>
              <th scope="col">Type</th>
              <th scope="col">Brand</th>
              <th scope="col">PN</th>
              <th scope="col">Action</th>
              <th scope="col" class="text-center">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tables as $item)
              <tr>
                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                <td>{{ $item->motorcycle_name }}</td>
                <td>{{ $item->motorcycle_type->type_name }}</td>
                <td>{{ $item->motorcycle_brand->brand_name }}</td>
                <td>{{ $item->police_number }}</td>
                <td>
                  <form action="/v2/motorcycle/{{ $item->id }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data?')" method="post">
                    @csrf
                    @method('DELETE')
  
                    <a href="/v2/motorcycle/{{ $item->id }}/edit" class="badge bg-badge-info color-info rad-6 fs-small text-decoration-none">
                      <span class="fa fa-fw fa-syringe mx-1"></span>
                      Edit
                    </a>
  
                    <button type="submit" class="badge bg-badge-danger text-danger rad-6 fs-small border-0">
                      <span class="fa fa-fw fa-trash mx-1"></span>
                    Hapus
                    </button>
                  </form>
                </td>
                <td class="text-center">
                  @if ($item->status == 'inactive')
                    <span class="badge bg-badge-danger text-danger rad-6 fs-small">{{ $item->status }}</span>
                  @else
                    <span class="badge bg-badge-success text-success rad-6 fs-small">{{ $item->status }}</span>
                  @endif
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