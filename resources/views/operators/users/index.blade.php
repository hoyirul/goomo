@extends('admin.layouts.main')

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
      <h5 class="m-0 font-weight-bold color-primary mb-2">Tabel Data {{ $title }}</h5>
      <p class="mb-3 float-left">Halaman ini untuk pengelolaan {{ strtolower($title) }}</p>
      @if ($title == 'Admins')          
        <a href="/u/users/create" class="btn btn-primary py-2 px-3 fs-normal float-right mb-3 shadow-sm"><span class="fas fa-user-plus"></span> Tambah Data</a>
      @endif
      
      <div class="table-responsive">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">NO</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Telp</th>
              <th>Alamat</th>
              <th>Kode Pos</th>
              <th>JK</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $row)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $row->name }}</td>
              <td>{{ $row->user->email }}</td>
              <td>{{ ($row->phone_number == NULL) ? 'NULL' : $row->phone_number }}</td>
              <td>{{ ($row->address == NULL) ? 'NULL' : $row->address }}</td>
              <td>{{ ($row->zip_code == NULL) ? 'NULL' : $row->zip_code }}</td>
              <td>{{ ($row->gender == 'L') ? 'Laki-laki' : 'Perempuan' }}</td>
              <td class="text-center">
                @if ($title == 'Admins')     
                  <a href="/u/admins/{{ $row->user_id }}/edit" class="btn fs-small btn-info text-decoration-none">
                    <span class="fa fa-fw fa-syringe mx-1"></span>
                    Edit
                  </a>
                @endif 
                
                @if ($title == 'Customers')  
                  <form action="/u/users/{{ $row->user_id }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data?')" method="post">
                    @csrf
                    @method('DELETE')  

                    <button type="submit" class="btn fs-small btn-danger">
                      <span class="fa fa-fw fa-trash mx-1"></span>
                    Hapus
                    </button>
                  </form>
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
<!-- /.container-fluid -->
@endsection
