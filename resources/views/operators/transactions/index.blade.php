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
              <th class="text-center">ID</th>
              <th class="text-center">User ID</th>
              <th class="text-center">Motorcycle ID</th>
              <th class="text-center">Start Date</th>
              <th class="text-center">End Date</th>
              <th class="text-center">Status</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tables as $row)
            <tr>
              <td class="text-center">{{ $row->txid }}</td>
              <td class="text-center">{{ $row->user_customer_id }}</td>
              <td class="text-center">{{ $row->motorcycle_id }}</td>
              <td class="text-center">{{ $row->start_at }}</td>
              <td class="text-center">{{ $row->end_at }}</td>
              <td class="text-center">{{ $row->status }}</td>
              <td class="text-center">
                <form action="/operator/transaction/{{ $row->id }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data?')" method="post">
                  @csrf
                  @method('DELETE')

                  <a href="/operator/transaction/{{ $row->id }}/edit" data-id="authorEdit{{ $row->id }}" class="btn fs-small btn-info text-decoration-none">
                    <span class="fa fa-fw fa-syringe mx-1"></span>
                    Edit
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
<!-- /.container-fluid -->
@endsection
