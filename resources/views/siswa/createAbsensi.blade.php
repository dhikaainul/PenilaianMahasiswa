@extends('layouts.master')
@section('content')
<!-- @section('content')
@php
$id = str_replace('@mail.com', '', Auth::user()->email);;
@endphp -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Absensi Siswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Absensi Siswa</li>
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
              <form role="form" action="{{ route( 'addAbsensi2' ) }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                  <label for="datetime" class="col-2 col-form-label">Date and time</label>
                     <div class="col-10">
                  <input class="form-control" type="datetime-local" id="example-datetime-local-input" name="datetime">
                  <br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="absen01" value="present">
                  <label class="form-check-label" for="status">Present</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="absen02" value="absent">
                  <label class="form-check-label" for="status">Absent</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="absen03" value="izin">
                  <label class="form-check-label" for="status">Izin</label>
                </div>
                <br>
                </br>
                <div class="form-group">
                    <label for="mapel">Mata Pelajaran</label>
                    <select class="form-control select2bs4" name="mapel" id="mapel" style="width: 100%;" required>
                      @foreach ($mapel as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_mapel}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nama_siswa">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Lengkap" required>
                  </div>
                  <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Penulisan kelas : Tingkat-Jurusan-No Kelas contoh : 1-MIPA-5" required>
                  </div>
                </div >
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <a href="{{ route('absensiSiswa') }}" class="btn btn-default">Cancel</a>
                </div>
              </form>
            </div>
          </div>
          </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  </div>
@endsection