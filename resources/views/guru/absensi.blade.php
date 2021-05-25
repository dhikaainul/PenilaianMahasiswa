@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Absensi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a Absensi>
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
              <div class="card-body table-responsive p-0">
              <table class="table text-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>DATETIME</th>
                        <th>STATUS</th>
                        <th>MAPEL</th>
                        <th>ACTION</th>
                        <th>NAMA</th>
                        <th>KELAS</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($absensi as $key => $item)
                          <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->datetime }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->mapel->nama_mapel }}</td>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>
                              <a href="{{ route('editAbsensi', $item->id) }}" class="badge badge-warning">Edit</a>
                              <a href="{{ route('deleteAbsensi', $item->id) }}" class="badge badge-danger">Delete</a>
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