@extends('layouts.admin.admin')

@section('title')
    Edit Data Jadwal Mata Pelajaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Ubah Jadwal</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="/jadwalmapel/{{$item->id}}/update" method="POST">
                @method('PUT')
                @csrf
                <label for="guru_id">Guru</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="gurus_id"><i class="fas fa-user"></i></span>
                  </div>
                  <select name="guru_id" required class="custom-select">
                    <option value="{{$item->guru_id}}">-- Ubah Bila Perlu --</option>
                    @foreach ($gurus as $gurus)
                        <option value="{{$gurus->id}}">
                            {{$gurus->nama}}
                        </option>
                    @endforeach
                  </select>
                </div>
                <label for="mapel_id">Mapel</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="mapels_id"><i class="fas fa-book-reader"></i></span>
                  </div>
                  <select class="custom-select" name="mapel_id">
                    <option value="{{$item->mapel_id}}">-- Ubah Bila Perlu --</option>
                    @foreach ($mapels as $mapels)
                        <option value="{{$mapels->id}}">
                          {{$mapels->nama_mapel}}
                        </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="kelas"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control @error('kelas') is-invalid @enderror" placeholder="Kelas" name="kelas" value="{{$item->kelas}}">
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
                      <label class="input-group-text" for="unit"><i class="fas fa-user-graduate"></i></label>
                    </div>
                    <select class="custom-select" name="unit">
                      <option>-- Pilih --</option>
                      <option value="K1" @if($item->unit == 'K1') selected @endif>K1</option>
                      <option value="K2" @if($item->unit == 'K2') selected @endif>K2</option>
                      <option value="K3" @if($item->unit == 'K3') selected @endif>K3</option>
                      <option value="SMP" @if($item->unit == 'SMP') selected @endif>SMP</option>
                      <option value="SMA" @if($item->unit == 'SMA') selected @endif>SMA</option>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                <a href="/jadwalmapel" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection