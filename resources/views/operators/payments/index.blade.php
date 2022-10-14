@extends('Operators.layouts.main')

@section('content')
<!-- Begin Page Content -->
<div class="container fs-normal">

  <!-- Page Heading -->
  <p class="mb-3">Tabel / Data / <span class="color-primary">{{ $title }}</span></p>

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
  <div class="card shadow mb-5 border-0">
    <div class="card-body">
      <h5 class="m-0 font-weight-bold color-primary mb-2" data-id="titleAuthor">Tabel Data {{ $title }}</h5>
      <p class="mb-3 float-left">Halaman ini untuk pengelolaan {{ strtolower($title) }}</p>
      
      <div class="table-responsive">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">Transfer ID</th>
              <th class="text-center">Invoice</th>
              <th class="text-center">Paid Date</th>
              <th class="text-center">Pay</th>
              <th class="text-center">Status</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tables as $row)
            <tr>
              <td class="text-center">{{ $row->txid }}</td>
              <td class="text-center">{{ $row->invoice }}</td>
              <td class="text-center">{{ $row->paid_date }}</td>
              <td class="text-center">{{ $row->pay }}</td>
              <td class="text-center">
                <select name="status" onchange="status_updat(this.options[this.selectedIndex].value, '{{ $row->id }}', '{{ $row->txid }}')" id="status" class="form-control rad-6 fs-normal">
                  <option value="unpaid" {{ ($row->status == 'unpaid') ? 'selected' : '' }}>Unpaid</option>
                  <option value="paid" {{ ($row->status == 'paid') ? 'selected' : '' }}>Paid</option>
                  <option value="processing" {{ ($row->status == 'processing') ? 'selected' : '' }}>Processing</option>
                </select>
              </td>
              <td class="text-center">
                <form action="/operator/transaction/{{ $row->id }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data?')" method="post">
                  @csrf
                  @method('DELETE')

                  <a href="/operator/payment-show/{{ $row->id }}" data-id="authorEdit{{ $row->id }}" class="btn fs-small btn-info text-decoration-none">
                    <span class="fa fa-fw fa-syringe mx-1"></span>
                    Show
                  </a>

                  <button type="submit" data-id="authorDelete{{ $row->id }}" class="btn fs-small btn-danger">
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

<script type="text/javascript">

  function status_updat(value, id, txid) {
    $.ajax({
      url:'/operator/payment-update',
      data: { 'status':value, 'id':id },
      success:function(msg){
          // alert("success");
      }
    });
    $.ajax({
      url:'/operator/transaction-update',
      data: { 'status':value, 'id':txid },
      success:function(msg){
          alert("success");
      }
    });
  };
</script>
<!-- /.container-fluid -->

@endsection
