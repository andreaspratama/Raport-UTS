@extends('layouts.app')

@section('title')
    Nilai | SD IT Bunayya
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 mt-4 mb-4">Nilai {{$item->nama}}</h1>
        
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            {{-- <a href="/siswa/cetaknilai" class="btn btn-success mb-3">Cetak Nilai</a> --}}
            <div class="table-responsive">
              <table class="table table-bordered text-center table-striped" id="table" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Tahun Akademik</th>
                    <th>Mapel</th>
                    <th>Nilai UH1</th>
                    <th>Nilai UH2</th>
                    <th>Nilai UTS</th>
                    <th>Nilai UAS</th>
                    <th>Status</th>
                    <th>Portofolio</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($item->mapel as $mapel)
                      <tr>
                        <td>{{$mapel->pivot->thnakademik}}</td>
                        <td>{{$mapel->nama_mapel}}</td>
                        <td>
                          @if ($mapel->pivot->nilai_uh1 >= 90)
                              A
                          @elseif ($mapel->pivot->nilai_uh1 >= 85)
                              B
                          @elseif ($mapel->pivot->nilai_uh1 >= 70)
                              C
                          @elseif ($mapel->pivot->nilai_uh1 >= 55)
                              D
                          @endif
                        </td>
                        <td>
                          @if ($mapel->pivot->nilai_uh2 >= 90)
                              A
                          @elseif ($mapel->pivot->nilai_uh2 >= 85)
                              B
                          @elseif ($mapel->pivot->nilai_uh2 >= 70)
                              C
                          @elseif ($mapel->pivot->nilai_uh2 >= 55)
                              D
                          @endif
                        </td>
                        <td>
                          @if ($mapel->pivot->uts >= 90)
                              A
                          @elseif ($mapel->pivot->uts >= 85)
                              B
                          @elseif ($mapel->pivot->uts >= 70)
                              C
                          @elseif ($mapel->pivot->uts >= 55)
                              D
                          @endif
                        </td>
                        <td>
                          @if ($mapel->pivot->uas >= 90)
                              A
                          @elseif ($mapel->pivot->uas >= 85)
                              B
                          @elseif ($mapel->pivot->uas >= 70)
                              C
                          @elseif ($mapel->pivot->uas >= 55)
                              D
                          @endif
                        </td>
                        <td>{{$mapel->pivot->status}}</td>
                        <td>
                          <img src="{{Storage::url($mapel->pivot->portofolio)}}" class="img-thumbnail" style="width: 250px" alt="">
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@push('prepend-style')
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@push('addon-script')
      <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script>
        $(document).ready(function() {
          $('#table').DataTable();
        } );
      </script>
@endpush