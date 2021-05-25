@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Kelas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Kelas</li>
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
              <div class="card-header">
                <a href="{{ route('createKelas') }}" class="btn btn-default btn-sm"><i class="fas fa-plus"></i> Tambah Baru</a>
              </div>
              <div class="card-body table-responsive p-0" style="height: 400px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>ID Kelas</th>
                        <th>Nama Kelas</th>
                        <th>Tingkatan</th>
                        <th>Jurusan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($kelas as $key => $item)
                          <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama_kelas }}</td>
                            <td>{{ $item->tingkatan }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>
                              <a href="{{ route('editKelas', $item->id) }}" class="badge badge-warning">Edit</a>
                              <a href="{{ route('deleteKelas', $item->id) }}" class="badge badge-danger">Delete</a>
                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection