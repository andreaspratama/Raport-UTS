@extends('layouts.admin.admin')

@section('title')
    Tambah atau Edit Nilai
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Nilai Siswa {{$item->nama}}</h1>

        <div class="card shadow">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-body">
                      <a href="/cetakNilai/{{$item->id}}/cetakProses" class="btn btn-primary btn-sm">Cetak Nilai {{$item->nama}}</a>
                      <a href="/guru/nilaiProsesKelas/{{$item->kelas}}" class="btn btn-secondary btn-sm">Kembali Ke Kelas</a>
                      <br>
                      <br>
                      <button type="button" class="btn btn-primary mb-3 btn-sm" data-toggle="modal"data-target="#exampleModal">
                          Tambah Nilai
                      </button>
                      <h3 class="text-primary" style="font-weight: bold">Soft Skills Project</h3>
                      <div class="table-responsive">
                        <table class="table table-bordered text-center nilai" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Mapel</th>
                              <th>Nilai</th>
                              <th>Deskripsi</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($mapel as $m)
                            <tr>
                              <td>
                                {{$m->nama_mapel}}
                              </td>
                              <td>
                                @foreach ($item->mapel as $ma)
                                    @if ($m->id === $ma->pivot->mapel_id)
                                      @if ($ma->pivot->nilai >= 90)
                                          A
                                      @elseif ($ma->pivot->nilai >= 80)
                                          AB
                                      @elseif ($ma->pivot->nilai >= 70)
                                          B
                                      @elseif ($ma->pivot->nilai <=69)
                                          C
                                      @endif
                                        {{-- {{$ma->pivot->nilai}} --}}
                                    {{-- @elseif ($m->id === $ma->pivot->mapel_id)
                                        {{$ma->pivot->nilai}}
                                    @elseif ($m->id === $ma->pivot->mapel_id)
                                        {{$ma->pivot->nilai}}
                                    @elseif ($m->id === $ma->pivot->mapel_id)
                                        {{$ma->pivot->nilai}}
                                    @elseif ($m->id === $ma->pivot->mapel_id)
                                        {{$ma->pivot->nilai}} --}}
                                    @endif
                                @endforeach
                              </td>
                              <td>
                                @if ($m->nama_mapel === 'Critical Thinking')
                                    Kemampuan memecahkan masalah dan kedalaman berpikir
                                @elseif ($m->nama_mapel === 'Creativity')
                                    Kemampuan menghasilkan karya yang autentik / orisinal
                                @elseif ($m->nama_mapel === 'Communication')
                                    Kemampuan dan Kejelasan menyampaikan pesan
                                @elseif ($m->nama_mapel === 'Collaboration')
                                    Kerjasama dan Kemampuan beradaptasi dalam tim
                                @elseif ($m->nama_mapel === 'Leadership')
                                    Sikap Tanggung Jawab dan Kedisiplinan
                                @endif
                              </td>
                              <td>
                                <a href="/siswa/{{$item->id}}/{{$m->id}}/nilaitambah" class="btn btn-primary btn-sm">Input Nilai</a>
                                <a href="/siswa/{{$item->id}}/{{$m->id}}/nilaiedit" class="btn btn-sm btn-warning">Edit Nilai</a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <button type="button" class="btn btn-primary mb-3 btn-sm" data-toggle="modal"data-target="#project">
                        Tambah Nilai
                      </button>
                      <h3 class="text-primary" style="font-weight: bold">Project</h3>
                      <div class="table-responsive">
                        <table class="table table-bordered text-center nilai" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Project</th>
                              <th>Nilai</th>
                              <th>Pengerjaan Project</th>
                              <th>Hasil</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($projects as $p)
                                <tr>
                                  <td>{{$p->project}}</td>
                                  <td>{{$p->nilai_pro}}</td>
                                  <td>{{$p->pengerjaan}}</td>
                                  <td><a href="{{$p->hasil}}">Klik Disini</a></td>
                                  <td>
                                    <a href="/edit/{{$p->siswa->id}}/{{$p->id}}/project" class="btn btn-primary btn-sm btn-warning">Edit</a>
                                    {{-- <a href="/siswa/{{$item->id}}/{{$mapel->id}}/nilaitambah" class="btn btn-primary btn-sm">Tambah / Edit</a> --}}
                                    {{-- <a href="/siswa/{{$item->id}}/{{$mapel->id}}/hapus" class="btn btn-danger btn-sm">Hapus</a> --}}
                                    {{-- <form action="/siswa/{{$item->id}}/{{$mapel->id}}/nilaihapus" method="post" class="btn btn-danger btn-sm d-inline">
                                      @csrf
                                      @method('delete')
                                      Hapus
                                    </form> --}}
                                  </td>
                                </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
                {{-- <a href="/guru/nilaiProsesKelas/{{$item->kelas}}" class="btn btn-secondary btn-sm">Kembali</a> --}}
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/siswa/{{$item->id}}/nilaitambah" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="nilai">Tahun Akademik</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="nilai"><i class="far fa-id-card"></i></span>
                        </div>
                        <select class="custom-select" name="thnakademik" id="thnakademik">
                          <option>-- Pilih Tahun Akademik --</option>
                          @foreach ($thnakademiks as $thnak)
                              <option value="{{$thnak->tahun_akademik}} {{$thnak->semester}}">
                              {{$thnak->tahun_akademik}} {{$thnak->semester}}
                              </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <label for="mapel">Mapel</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="mapel"><i class="fas fa-book-reader"></i></span>
                    </div>                    
                    <select class="custom-select" name="mapel">
                        <option>-- Pilih Mapel --</option>
                        @foreach ($mapel as $mapel)
                            <option value="{{$mapel->id}}">
                            {{$mapel->nama_mapel}}
                            </option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="nilai"><i class="far fa-id-card"></i></span>
                          </div>
                          <input type="text" class="form-control @error('nilai') is-invalid @enderror" placeholder="Nilai" name="nilai" value="{{old('nilai')}}">
                          @error('nilai')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                        </div>
                    </div>
                    {{-- <div class="form-group">
                      <label for="project">Project</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="project"><i class="far fa-id-card"></i></span>
                        </div>
                        <input type="text" class="form-control @error('project') is-invalid @enderror" placeholder="Project" name="project">
                        @error('project')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nilai_pro">Nilai Project</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="nilai_pro"><i class="far fa-id-card"></i></span>
                        </div>
                        <input type="text" class="form-control @error('nilai_pro') is-invalid @enderror" placeholder="Nilai" name="nilai_pro" value="{{old('nilai_pro')}}">
                        @error('nilai')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <label for="task">Pengerjaan Project</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="task"><i class="fas fa-book-reader"></i></span>
                    </div>                    
                    <select class="custom-select" name="task">
                        <option value="">Pilih</option>
                        <option value="Individu">
                          Individu
                        </option>
                        <option value="Kelompok">
                          Kelompok
                        </option>
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="hasil">Hasil</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="hasil"><i class="far fa-id-card"></i></span>
                        </div>
                        <input type="text" class="form-control @error('hasil') is-invalid @enderror" placeholder="Hasil" name="hasil" value="{{old('hasil')}}">
                        @error('hasil')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                      </div>
                    </div> --}}
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
              <form action="/siswa/{{$item->id}}/nilaitambahproject" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="project">Project</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="project"><i class="far fa-id-card"></i></span>
                      </div>
                      <input type="text" class="form-control @error('project') is-invalid @enderror" placeholder="Project" name="project">
                      @error('project')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nilai_pro">Nilai Project</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="nilai_pro"><i class="far fa-id-card"></i></span>
                      </div>
                      <input type="text" class="form-control @error('nilai_pro') is-invalid @enderror" placeholder="Nilai" name="nilai_pro" value="{{old('nilai_pro')}}">
                      @error('nilai')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <label for="task">Pengerjaan Project</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="task"><i class="fas fa-book-reader"></i></span>
                  </div>                    
                  <select class="custom-select" name="task">
                      <option value="">Pilih</option>
                      <option value="Individu">
                        Individu
                      </option>
                      <option value="Kelompok">
                        Kelompok
                      </option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="hasil">Hasil</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="hasil"><i class="far fa-id-card"></i></span>
                      </div>
                      <input type="text" class="form-control @error('hasil') is-invalid @enderror" placeholder="Hasil" name="hasil" value="{{old('hasil')}}">
                      @error('hasil')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
              </form>
          </div>
      </div>
      </div>
    </div>
@endsection


@push('prepend-style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
@endpush

@push('addon-script')
      <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      {{-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> --}}
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
      <script>
        $(document).ready(function() {
          $('.nilai').DataTable();
        } );
      </script>
      <script>
        @if (Session::has('project'))
          toastr.success("{{Session::get('project')}}", "Trimakasih")
        @endif

        // $.fn.editable.defaults.mode = 'inline';

        // $(document).ready(function() {
        //     $('.nilai_uh1').editable();
        // });
        // $(document).ready(function() {
        //     $('.nilai_uh2').editable();
        // });
        // $(document).ready(function() {
        //     $('.uts').editable();
        // });
        // $(document).ready(function() {
        //     $('.uas').editable();
        // });
        // $(document).ready(function() {
        //     $('.project').editable();
        // });
      </script>
@endpush