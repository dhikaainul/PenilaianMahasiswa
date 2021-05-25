@extends('layouts.master')

@section('content')
@php
$id = str_replace('@mail.com', '', Auth::user()->email);;
@endphp
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Penilaian</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('penilaian', $id) }}">Penilaian</a></li>
              <li class="breadcrumb-item active">Tambah Penilaian</li>
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
              <form role="form" action="{{ route('storePenilaian') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="siswa">Nama Siswa</label>
                    <select class="form-control select2bs4" name="siswa" id="siswa" style="width: 100%;" required>
                      @foreach ($siswa as $item)
                        <option value="{{ $item->id }}">{{ $item->nis . " - " . $item->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nilai">Nilai</label>
                    <input type="number" class="form-control" id="nilai" name="nilai" required>
                  </div>
                  <input type="hidden" name="id_mapel" value="{{ $id_mapel }}">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <a href="{{ route('penilaian') }}" class="btn btn-default">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection