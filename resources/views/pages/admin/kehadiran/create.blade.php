@extends('layouts.admin.admin')

@section('title')
    Tambah Data Kehadiran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Kehadiran</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('hadir.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="nama">Nama Kehadiran</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="nama"><i class="fas fa-book-reader"></i></span>
                    </div>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Kehadiran" name="nama" value="{{old('nama')}}">
                    @error('nama')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                <a href="{{route('hadir.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection