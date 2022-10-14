@extends('operators.layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container fs-normal">

   <!-- Page Heading -->
   <p class="mb-3">Tabel / Data / <span class="color-primary">{{ $title }}</span></p>
  <div class="row">
    <div class="col-md-6">
      <h5 class="m-0 font-weight-bold color-primary mb-2">Detail {{ $title }}</h5>
      <p class="mb-4"></p>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
      <a href="/operator/payment" class="btn btn-primary mx-2 py-2 shadow-sm fs-normal align-self-center px-3 mt-n3">
         <span class="fas fa-arrow-left"></span> Kembali</a>
    </div>
  </div>

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

   <!-- DataTales Example -->
   <div class="card shadow mb-4 border-0">
      <div class="card-header bg-white py-3">
         <h6 class="m-0 font-weight-bold color-primary">Data {{ $title }}</h6>
      </div>
      <div class="card-body container-fluid">
        <div>
          <div class="mb-3 row">
            <div class="col-md-6">
              <label for="op-name" class="fs-normal mb-1">User Operator : </label>
              <input type="name" name="op-name" readonly class="form-control rad-6 fs-normal @error('name') is-invalid @enderror" value="{{ $tables->user_operator->name }}" placeholder="Motorcycle Name">
              @error('name')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="name" class="fs-normal mb-1">User Customer : </label>
              <input type="name" name="name" readonly class="form-control rad-6 fs-normal @error('name') is-invalid @enderror" value="{{ $tables->user_customer->name }}" placeholder="Motorcycle Name">
              @error('name')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>


          <div class="mb-3 row">
            <div class="col-md-4">
              <label for="txid" class="fs-normal mb-1">Transfer ID : </label>
              <input type="text" name="txid" readonly class="form-control rad-6 fs-normal @error('txid') is-invalid @enderror" value="{{ $tables->txid }}" placeholder="Transfer ID">
              @error('motorcycle_brand')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="invoice" class="fs-normal mb-1">Invoice : </label>
              <input type="text" name="invoice" readonly class="form-control rad-6 fs-normal @error('invoice') is-invalid @enderror" placeholder="Motorcycle Type" value="{{ $tables->invoice }}">
              @error('motorcycle_name')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="police_number" class="fs-normal mb-1">Evidence Transfer : </label>
              <a href="{{ asset('storage/'.$tables->evidence_of_transfer) }}" target="_blank" class="btn btn-success form-control rad-6 fs-normal">{{ 'View (Evidence)' }}</a>
            </div>
          </div>

          <div class="mb-3 row">
            <div class="col-md-4">
              <label for="total" class="fs-normal mb-1">Total : </label>
              <input type="text" name="total" readonly class="form-control rad-6 fs-normal @error('total') is-invalid @enderror" value="{{ $tables->transaction->total }}" placeholder="Total">
              @error('total')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="pay" class="fs-normal mb-1">Pay : </label>
              <input type="text" name="pay" readonly class="form-control rad-6 fs-normal @error('pay') is-invalid @enderror" placeholder="Pay" value="{{ $tables->pay }}">
              @error('motorcycle_name')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="pay_date" class="fs-normal mb-1">Pay Date : </label>
              <input type="text" name="pay_date" readonly class="form-control rad-6 fs-normal @error('pay_date') is-invalid @enderror" placeholder="Pay Date" value="{{ $tables->paid_date }}">
              @error('motorcycle_name')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="mb-3">
            @if ($tables->status == 'unpaid')
              <a href="#" class="btn btn-danger fs-normal px-5 float-end py-2 rad-6">Unpaid</a>
            @elseif ($tables->status == 'processing')
              <a href="#" class="btn btn-secondary fs-normal px-5 float-end py-2 rad-6">Processing</a>
            @else
              <a href="#" class="btn btn-success fs-normal px-5 float-end py-2 rad-6">Paid</a>
            @endif
          </div>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
@endsection