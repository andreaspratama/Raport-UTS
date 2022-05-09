@extends('layouts.admin.admin')

@section('title')
    Edit Nilai
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Nilai Siswa {{$item->nama}}</h1>

        <div class="card shadow">
            <div class="card-body">
              <form action="/siswa/{{$item->id}}/{{$mapel->id}}/editnilaiupdate" method="POST">
                @csrf
                <div class="form-group">
                  <label for="mapel">Mapel</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="mapel"><i class="far fa-id-card"></i></span>
                    </div>
                    <input type="text" class="form-control @error('mapel') is-invalid @enderror" placeholder="Mapel" name="mapel" value="{{$mapel->nama_mapel}}" disabled>
                    @error('mapel')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                    <label for="nilai">Nilai</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="nilai"><i class="far fa-id-card"></i></span>
                      </div>
                      <input type="text" class="form-control @error('nilai') is-invalid @enderror" placeholder="Nilai" name="nilai">
                      @error('nilai')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                </div>
                <button class="btn btn-primary btn-sm" type="submit">Simpan Perubahan</button>
              </form>
            </div>
        </div>

    </div>
@endsection


@push('prepend-style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
@endpush

@push('addon-script')
      {{-- <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> --}}
      <script>
        @if (Session::has('status'))
          toastr.success("{{Session::get('status')}}", "Trimakasih")
        @endif

        $.fn.editable.defaults.mode = 'inline';

        $(document).ready(function() {
            $('.nilai_uh1').editable();
        });
        $(document).ready(function() {
            $('.nilai_uh2').editable();
        });
        $(document).ready(function() {
            $('.uts').editable();
        });
        $(document).ready(function() {
            $('.uas').editable();
        });
        $(document).ready(function() {
            $('.status').editable();
        });
      </script>
@endpush