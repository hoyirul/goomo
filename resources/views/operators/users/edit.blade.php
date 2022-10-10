@extends('admin.layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container fs-normal">
  <!-- Page Heading -->
  <p class="mb-3">Tabel / Data / <span class="color-primary">Add Data</span></p>
  <div class="row">
    <div class="col-md-6">
      <h5 class="m-0 font-weight-bold color-primary mb-2">Tambah Data Bayi</h5>
      <p class="mb-4">Hati-hati dalam input data. Tolong di perhatikan dengan teliti!.</p>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
      <a href="/baby" class="btn btn-primary mx-2 py-2 shadow-sm fs-normal align-self-center px-3 mt-n3">
        <span class="fas fa-arrow-left"></span> Kembali</a>
    </div>
  </div>
  <!-- DataTales Example -->
  <div class="card border-0 shadow mb-4">
    <div class="card-header bg-white py-3">
      <h6 class="m-0 font-weight-bold color-primary">Data Bayi</h6>
    </div>
    <div class="card-body container-fluid">
      <form method="post" action="{{ url('/baby') }}">
        @csrf
        <div class="row">
          <div class="col-xl-6 mr-auto">
            <div class="form-group">
              <label for="nik_bayi">NIK Bayi (Optional)</label>
              <input type="text" placeholder="NIK Bayi" class="form-control fs-normal form-spacer-20x15 @error('nik_bayi') is-invalid @enderror" id="nik_bayi" name="nik_bayi" data-toggle="tooltip" data-placement="right" title="Nama Lengkap Ibu Bayi" value="{{ old('nik_bayi') }}" autofocus>
              @error('nik_bayi')
                <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama_ibu">Nama Ibu</label>
              <input type="text" placeholder="Nama Ibu" class="form-control fs-normal form-spacer-20x15 @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu" data-toggle="tooltip" data-placement="right" title="Nama Lengkap Ibu Bayi" value="{{ old('nama_ibu') }}">
              @error('nama_ibu')
                <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
              <input type="text" placeholder="Pekerjaan Ibu" class="form-control fs-normal form-spacer-20x15 @error('pekerjaan_ibu') is-invalid @enderror" id="pekerjaan_ibu" name="pekerjaan_ibu" data-toggle="tooltip" data-placement="right" title="Nama Lengkap Ibu Bayi" value="{{ old('pekerjaan_ibu') }}">
              @error('pekerjaan_ibu')
                <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama_ayah">Nama Ayah</label>
              <input type="text" placeholder="Nama Ayah" class="form-control fs-normal form-spacer-20x15 @error('nama_ayah') is-invalid @enderror" id="nama_ayah" name="nama_ayah" data-toggle="tooltip" data-placement="right" title="Nama Lengkap Ayah Bayi" value="{{ old('nama_ayah') }}">
              @error('nama_ayah')
                <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
              <input type="text" placeholder="Pekerjaan Ayah" class="form-control fs-normal form-spacer-20x15 @error('pekerjaan_ayah') is-invalid @enderror" id="pekerjaan_ayah" name="pekerjaan_ayah" data-toggle="tooltip" data-placement="right" title="Nama Lengkap Ayah Bayi" value="{{ old('pekerjaan_ayah') }}">
              @error('pekerjaan_ayah')
                <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
              @enderror
            </div>
          </div>
          <div class="col-xl-6 ml-auto">
            <div class="form-group">
              <label for="no_kms">No KMS (Optional)</label>
              <input type="text" placeholder="Nomor KMS" class="form-control fs-normal form-spacer-20x15 @error('no_kms') is-invalid @enderror" id="no_kms" name="no_kms" data-toggle="tooltip" data-placement="right" title="No KMS" value="{{ old('no_kms') }}">
              @error('no_kms')
                <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Nama Bayi</label>
              <input type="text" placeholder="Nama Bayi" class="form-control fs-normal form-spacer-20x15 @error('nama') is-invalid @enderror" id="nama" name="nama" data-toggle="tooltip" data-placement="right" title="Nama Lengkap Bayi" value="{{ old('nama') }}">
              @error('nama')
              <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
              @enderror
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="tempat_lahir">Tempat Lahir</label>
                  <input type="text" placeholder="Tempat Lahir" class="form-control fs-normal form-spacer-20x15 @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" data-toggle="tooltip" data-placement="right" title="Tempat Lahir Bayi" value="{{ old('tempat_lahir') }}">
                  @error('tempat_lahir')
                  <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  <input type="datetime-local" class="form-control fs-normal form-spacer-20x15 @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" data-toggle="tooltip" data-placement="right" title="Tanggal Lahir Bayi" value="<?= date('Y-m-d')."T".date('H:i') ?>" max="<?= date('Y-m-d'); ?>T23:59">
                  @error('tanggal_lahir')
                  <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
                  @enderror
                </div>
              </div>
            </div>
            
            <div class="form-group row">
              <div class="col-md-6">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" placeholder="Nama Bayi" class="form-control-select fs-normal form-spacer-10x8 @error('jenis_kelamin') is-invalid @enderror" data-toggle="tooltip" data-placement="right" title="Golongan Darah Bayi">
                  <option value="1" {{ (old('jenis_kelamin') == 1) ? 'selected' : '' }}>Laki-laki</option>
                  <option value="2" {{ (old('jenis_kelamin') == 2) ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                  <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="golongan_darah">Golongan Darah</label>
                <select id="golongan_darah" name="golongan_darah" placeholder="Nama Bayi" class="form-control-select fs-normal form-spacer-10x8 @error('golongan_darah') is-invalid @enderror" data-toggle="tooltip" data-placement="right" title="Golongan Darah Bayi">
                  <option selected value="BT">Belum Tahu</option>
                  <option value="A" {{ (old('golongan_darah') == 'A') ? 'selected' : '' }}>A</option>
                  <option value="B" {{ (old('golongan_darah') == 'B') ? 'selected' : '' }}>B</option>
                  <option value="AB" {{ (old('golongan_darah') == 'AB') ? 'selected' : '' }}>AB</option>
                  <option value="O" {{ (old('golongan_darah') == 'O') ? 'selected' : '' }}>O</option>
                </select>
                @error('golongan_darah')
                  <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-4">
                <label for="panjang_bayi">Panjang Bayi</label>
                <input type="number" min="1" placeholder="Dalam cm" class="form-control fs-normal form-spacer-20x15 @error('panjang_bayi') is-invalid @enderror" name="panjang_bayi" id="panjang_bayi" data-toggle="tooltip" data-placement="right" title="Tinggi Badan Bayi Saat Lahir" value="{{ old('panjang_bayi') }}" step="any">
                @error('panjang_bayi')
                  <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
                @enderror
              </div>

              <div class="col-md-4">
                <label for="berat_bayi">Berat Bayi</label>
                <input type="number" min="1" placeholder="Dalam kg" class="form-control fs-normal form-spacer-20x15 @error('berat_bayi') is-invalid @enderror" name="berat_bayi" id="berat_bayi" data-toggle="tooltip" data-placement="right" title="Berat Badan Bayi Saat Lahir" value="{{ old('berat_bayi') }}" step="any">
                @error('berat_bayi')
                  <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
                @enderror
              </div>

              <div class="col-md-4">
                <label for="anak_ke">Anak ke-</label>
                  <input type="number" min="1" placeholder="Anak Ke" class="form-control fs-normal form-spacer-20x15 @error('anak_ke') is-invalid @enderror" name="anak_ke" id="anak_ke" data-toggle="tooltip" data-placement="right" title="Anak Ke-" value="{{ old('anak_ke') }}">
                  @error('anak_ke')
                    <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
                  @enderror
              </div>
            </div>
          </div>
          
        </div>
        
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea placeholder="Alamat" class="form-control fs-normal form-spacer-20x15 @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"  data-toggle="tooltip" data-placement="right" title="Alamat Lengkap"></textarea>
          @error('alamat')
          <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
          @enderror
        </div>

        <button type="submit" class="btn py-2 px-5 float-right font-medium btn-primary">Tambah</button>
            
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection