@extends('layouts.admin.admin')

@section('title')
    Edit Data Seni
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Seni {{$item->nama_seni}}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('seni.update', $item->id)}}" method="POST">
              @method('PUT')
              @csrf
              <div class="form-group">
                <label for="nama">Nama Seni</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="nama"><i class="fas fa-book-reader"></i></span>
                  </div>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Seni" name="nama" value="{{$item->nama}}">
                  @error('nama')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
              <button type="submit" class="btn btn-success btn-sm">Simpan</button>
              <a href="{{route('seni.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
          </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection