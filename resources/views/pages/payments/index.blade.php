@extends('pages.layouts.main')

@section('content')
<div class="row mb-1">
  <div class="col-md-12 mb-3">
    <a href="/" class="text-decoration-none float-end text-dark"><span class="fa fa-home me-1"></span> Home</a>
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

        <table class="table fs-normal table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">TXID</th>
              <th scope="col">INV</th>
              <th scope="col">Total</th>
              <th scope="col">Date</th>
              <th scope="col">Action</th>
              <th scope="col" class="text-center">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tables as $item)
              <tr>
                <td><a href="/v2/transaction/{{ $item->txid }}/show">#{{ $item->txid }}</a></td>
                <td class="font-semibold">#{{ $item->invoice }}</td>
                <td>Rp. {{ number_format($item->transaction->total) }}</td>
                <td>{{ $item->paid_date }}</td>
                <td>
                  <a href="/v2/transaction/{{ $item->txid }}/show" class="badge bg-badge-info color-info rad-6 fs-small text-decoration-none">Detail</a>
                </td>
                <td class="text-center">
                  @if ($item->status == 'unpaid')
                    <span class="badge bg-badge-danger text-danger rad-6 fs-small">Unpaid</span>
                  @elseif($item->status == 'processing')
                    <span class="badge bg-badge-grey text-secondary rad-6 fs-small">Processing</span>
                  @else
                    <span class="badge bg-badge-success text-success rad-6 fs-small">Paid</span>
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