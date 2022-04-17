@extends('layouts.admin.admin')

@section('title')
    Tambah Data Jadwal Mata Pelajaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Guru</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="/jadwalmapel/store" method="POST">
              @csrf
                <label for="guru_id">Guru</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="guru_id"><i class="fas fa-user"></i></span>
                  </div>
                  <select class="custom-select" name="guru_id" required>
                    <option>-- Pilih Guru --</option>
                    @foreach ($guru as $guru)
                        <option value="{{$guru->id}}">
                          {{$guru->nama}}
                        </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="kelas"><i class="fas fa-users"></i></span>
                    </div>
                    <input type="text" class="form-control @error('kelas') is-invalid @enderror" placeholder="Kelas" name="kelas" value="{{old('kelas')}}">
                    @error('kelas')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                    <label for="unit">Unit</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="unit"><i class="fas fa-school"></i></label>
                      </div>
                      <select class="custom-select" name="unit">
                        <option>-- Pilih --</option>
                        <option value="K1">K1</option>
                        <option value="K2">K2</option>
                        <option value="K3">K3</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                      </select>
                    </div>
                </div>
              <button type="submit" class="btn btn-success btn-sm">Simpan</button>
              <button type="reset" class="btn btn-warning btn-sm">Reset</button>
              <a href="/jadwalmapel" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection