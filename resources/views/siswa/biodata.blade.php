@extends('layouts.master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Biodata Siswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Biodata Siswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-2">
                    @if (Auth::user()->photo == null)
                      <img class="img-circle elevation-2" src="{{  url('storage/'.$siswa->image) }}" width="150px" height="150px" alt="User Avatar">  
                    @else
                      <img class="img-circle elevation-2" src="{{ url('storage/'.$siswa->image) }}" width="150px" height="150px" alt="User Avatar">
                    @endif
                  </div>
                  <div class="col-lg-10">
                    <dl class="row">
                      <dt class="col-sm-4">NIS</dt>
                      <dd class="col-sm-8">{{ $siswa->nis }}</dd>
                      <dt class="col-sm-4">Nama Lengkap</dt>
                      <dd class="col-sm-8">{{ $siswa->nama }}</dd>
                      <dt class="col-sm-4">Jenis Kelamin</dt>
                      <dd class="col-sm-8">                    
                        @if ($siswa->jenis_kelamin == 'L')
                            Laki - Laki
                        @else
                            Perempuan
                        @endif
                      </dd>
                      <dt class="col-sm-4">Alamat</dt>
                      <dd class="col-sm-8">{{ $siswa->alamat }}</dd>
                      <dt class="col-sm-4">No. Telp.</dt>
                      <dd class="col-sm-8">{{ $siswa->no_telp }}</dd>
                      <dt class="col-sm-4">Kelas</dt>
                      <dd class="col-sm-8">{{ $siswa->kelas->nama_kelas }}</dd>
                    </dl>
                  </div>
                </div>
                <a href="{{ route('editBiodataSiswa', $siswa->id) }}" class="btn btn-primary">Edit Biodata</a>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection