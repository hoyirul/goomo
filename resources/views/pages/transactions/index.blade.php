@extends('pages.layouts.main')

@section('content')
<div class="row mb-1">
  <div class="col-md-12 mb-3">
    <a href="/" class="text-decoration-none float-end text-dark"><span class="fa fa-home me-1"></span> Home</a>
    <h5 class="float-start font-semibold">Transactions</h5>
  </div>

  @include('pages.partials.sidebar')

  <div class="col-md-9 mb-3">
    <div class="card w-100 border-0 rad-10">
      <div class="card-body m-3">
        <h6 class="font-medium">Transactions</h6>
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
              <th scope="col">INV</th>
              <th scope="col">Date</th>
              <th scope="col">Total</th>
              <th scope="col">Action</th>
              <th scope="col" class="text-center">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $item)
              <tr>
                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                <td>#{{ $item->id }}</td>
                <td>{{ $item->order_date }}</td>
                <td>Rp. {{ number_format($item->total) }}</td>
                <td>
                  <a href="/user/transaction/{{ $item->id }}/detail" class="badge bg-badge-info color-info rad-6 fs-small text-decoration-none">Detail</a>
                </td>
                <td class="text-center">
                  @if ($item->status == 'unpaid')
                    <span class="badge bg-badge-danger text-danger rad-6 fs-small">Unpaid</span>
                  @else
                    <span class="badge bg-badge-success color-primary rad-6 fs-small">Paid</span>
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