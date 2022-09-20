@extends('layouts.admin.admin')

@section('title')
    Tambah atau Edit Nilai
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah  Siswa {{$item->nama}}</h1>

        <div class="card shadow">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-body">
                      <a href="/cetakNilai/{{$item->id}}/cetakProses" class="btn btn-primary btn-sm">Download Nilai PDF {{$item->nama}}</a>
                      <a href="/guru/nilaiProsesKelas/{{$item->kelas}}" class="btn btn-secondary btn-sm">Kembali Ke Kelas</a>
                      <br>
                      <br>
                      {{-- <button type="button" class="btn btn-primary mb-3 btn-sm" data-toggle="modal"data-target="#exampleModal">
                          Tambah Nilai
                      </button> --}}
                      <h3 class="text-primary" style="font-weight: bold">Nilai</h3>
                      <div class="table-responsive">
                        <table class="table table-bordered text-center nilai" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Muatan Pelajaran</th>
                              <th>Nilai</th>
                              <th>Predikat</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($mapel as $m)
                            <tr>
                              <td>
                                {{$loop->iteration}}
                              </td>
                              <td>
                                {{$m->nama_mapel}}
                              </td>
                              <td>
                                @foreach ($item->mapel as $ma)
                                  @if ($m->id === $ma->pivot->mapel_id)
                                      {{$ma->pivot->nilai}}
                                  @endif
                                @endforeach
                                {{-- @foreach ($item->mapel as $ma)
                                    @if ($m->id === $ma->pivot->mapel_id)
                                      @if ($ma->pivot->nilai >= 86)
                                          A
                                      @elseif ($ma->pivot->nilai >= 71)
                                          B
                                      @elseif ($ma->pivot->nilai >= 56)
                                          C
                                      @elseif ($ma->pivot->nilai <=55)
                                          D
                                      @endif --}}
                                        {{-- {{$ma->pivot->nilai}} --}}
                                    {{-- @elseif ($m->id === $ma->pivot->mapel_id)
                                        {{$ma->pivot->nilai}}
                                    @elseif ($m->id === $ma->pivot->mapel_id)
                                        {{$ma->pivot->nilai}}
                                    @elseif ($m->id === $ma->pivot->mapel_id)
                                        {{$ma->pivot->nilai}}
                                    @elseif ($m->id === $ma->pivot->mapel_id)
                                        {{$ma->pivot->nilai}} --}}
                                    {{-- @endif
                                @endforeach --}}
                              </td>
                              <td>
                                @foreach ($item->mapel as $ma)
                                    @if ($m->id === $ma->pivot->mapel_id)
                                      @if ($ma->pivot->nilai >= 86)
                                          A
                                      @elseif ($ma->pivot->nilai >= 71)
                                          B
                                      @elseif ($ma->pivot->nilai >= 56)
                                          C
                                      @elseif ($ma->pivot->nilai <=55)
                                          D
                                      @endif
                                    @endif
                                @endforeach
                                {{-- @if ($m->nama_mapel === 'Critical Thinking')
                                    Kemampuan memecahkan masalah dan kedalaman berpikir
                                @elseif ($m->nama_mapel === 'Creativity')
                                    Kemampuan menghasilkan karya yang autentik / orisinal
                                @elseif ($m->nama_mapel === 'Communication')
                                    Kemampuan dan Kejelasan menyampaikan pesan
                                @elseif ($m->nama_mapel === 'Collaboration')
                                    Kerjasama dan Kemampuan beradaptasi dalam tim
                                @elseif ($m->nama_mapel === 'Leadership')
                                    Sikap Tanggung Jawab dan Kedisiplinan
                                @endif --}}
                              </td>
                              <td>
                                @if ($item->mapel()->where('mapel_id', $m->id)->exists())
                                    <a href="/siswa/{{$item->id}}/{{$m->id}}/nilaiedit" class="btn btn-sm btn-warning">Edit Nilai</a>
                                @else
                                    <a href="/siswa/{{$item->id}}/{{$m->id}}/nilaitambah" class="btn btn-primary btn-sm">Input Nilai</a>
                                @endif
                                <!--<a href="/siswa/{{$item->id}}/{{$m->id}}/nilaitambah" class="btn btn-primary btn-sm">Input Nilai</a>-->
                                <!--<a href="/siswa/{{$item->id}}/{{$m->id}}/nilaiedit" class="btn btn-sm btn-warning">Edit Nilai</a>-->
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-bordered text-center nilai" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Seni dan Budaya</th>
                              <th>Nilai</th>
                              <th>Predikat</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($seni as $sn)
                            <tr>
                              <td>
                                {{$sn->nama}}
                              </td>
                              <td>
                                @foreach ($item->seni as $sen)
                                      @if ($sn->id === $sen->pivot->seni_id)
                                        {{$sen->pivot->nilai}}
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
                                @foreach ($item->seni as $sni)
                                    @if ($sn->id === $sni->pivot->seni_id)
                                      @if ($sni->pivot->nilai >= 86)
                                          A
                                      @elseif ($sni->pivot->nilai >= 71)
                                          B
                                      @elseif ($sni->pivot->nilai >= 56)
                                          C
                                      @elseif ($sni->pivot->nilai <=55)
                                          D
                                      @endif
                                    @endif
                                @endforeach
                                {{-- @if ($m->nama_mapel === 'Critical Thinking')
                                    Kemampuan memecahkan masalah dan kedalaman berpikir
                                @elseif ($m->nama_mapel === 'Creativity')
                                    Kemampuan menghasilkan karya yang autentik / orisinal
                                @elseif ($m->nama_mapel === 'Communication')
                                    Kemampuan dan Kejelasan menyampaikan pesan
                                @elseif ($m->nama_mapel === 'Collaboration')
                                    Kerjasama dan Kemampuan beradaptasi dalam tim
                                @elseif ($m->nama_mapel === 'Leadership')
                                    Sikap Tanggung Jawab dan Kedisiplinan
                                @endif --}}
                              </td>
                              <td>
                                @if ($item->seni()->where('seni_id', $sn->id)->exists())
                                    <a href="/siswa/{{$item->id}}/{{$sn->id}}/nilaieditseni" class="btn btn-sm btn-warning">Edit Nilai</a>
                                @else
                                    <a href="/siswa/{{$item->id}}/{{$sn->id}}/nilaitambahseni" class="btn btn-primary btn-sm">Input Nilai</a>
                                @endif
                                <!--<a href="/siswa/{{$item->id}}/{{$m->id}}/nilaitambah" class="btn btn-primary btn-sm">Input Nilai</a>-->
                                <!--<a href="/siswa/{{$item->id}}/{{$m->id}}/nilaiedit" class="btn btn-sm btn-warning">Edit Nilai</a>-->
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-bordered text-center nilai" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Muatan Lokal</th>
                              <th>Nilai</th>
                              <th>Predikat</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($projects as $p)
                              <tr>
                                <td>
                                  {{$p->nama}}
                                </td>
                                <td>
                                  @foreach ($item->project as $pro)
                                      @if ($p->id === $pro->pivot->project_id)
                                        {{$pro->pivot->nilai}}
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
                                  @foreach ($item->project as $pro)
                                    @if ($p->id === $pro->pivot->project_id)
                                      @if ($pro->pivot->nilai >= 86)
                                          A
                                      @elseif ($pro->pivot->nilai >= 71)
                                          B
                                      @elseif ($pro->pivot->nilai >= 56)
                                          C
                                      @elseif ($pro->pivot->nilai <=55)
                                          D
                                      @endif
                                    @endif
                                  @endforeach
                                </td>
                                <td>
                                    @if ($item->project()->where('project_id', $p->id)->exists())
                                        <a href="/siswa/{{$item->id}}/{{$p->id}}/nilaieditproject" class="btn btn-sm btn-warning">Edit Nilai</a>
                                    @else
                                        <a href="/siswa/{{$item->id}}/{{$p->id}}/nilaitambahproject" class="btn btn-primary btn-sm">Input Nilai</a>
                                    @endif
                                </td>
                              </tr>
                            @endforeach
                              {{-- @foreach ($projects as $p)
                                <tr>
                                  <td>{{$p->project}}</td>
                                  <td>{{$p->nilai_pro}}</td>
                                  <td>{{$p->pengerjaan}}</td>
                                  <td><a href="{{$p->hasil}}">Klik Disini</a></td>
                                  <td>
                                    <a href="/edit/{{$p->siswa->id}}/{{$p->id}}/project" class="btn btn-primary btn-sm btn-warning">Edit</a> --}}
                                    {{-- <a href="/siswa/{{$item->id}}/{{$mapel->id}}/nilaitambah" class="btn btn-primary btn-sm">Tambah / Edit</a> --}}
                                    {{-- <a href="/siswa/{{$item->id}}/{{$mapel->id}}/hapus" class="btn btn-danger btn-sm">Hapus</a> --}}
                                    {{-- <form action="/siswa/{{$item->id}}/{{$mapel->id}}/nilaihapus" method="post" class="btn btn-danger btn-sm d-inline">
                                      @csrf
                                      @method('delete')
                                      Hapus
                                    </form> --}}
                                  {{-- </td>
                                </tr>
                              @endforeach --}}
                          </tbody>
                        </table>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-bordered text-center nilai" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Ketidakhadiran</th>
                              <th>Hari</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($hadir as $h)
                              <tr>
                                <td>
                                  {{$h->nama}}
                                </td>
                                <td>
                                  @foreach ($item->hadir as $had)
                                      @if ($h->id === $had->pivot->kehadiran_id)
                                        {{$had->pivot->nilai}}
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
                                    @if ($item->hadir()->where('kehadiran_id', $h->id)->exists())
                                        <a href="/siswa/{{$item->id}}/{{$h->id}}/nilaiedithadir" class="btn btn-sm btn-warning">Edit Nilai</a>
                                    @else
                                        <a href="/siswa/{{$item->id}}/{{$h->id}}/nilaitambahhadir" class="btn btn-primary btn-sm">Input Nilai</a>
                                    @endif
                                </td>
                              </tr>
                            @endforeach
                              {{-- @foreach ($projects as $p)
                                <tr>
                                  <td>{{$p->project}}</td>
                                  <td>{{$p->nilai_pro}}</td>
                                  <td>{{$p->pengerjaan}}</td>
                                  <td><a href="{{$p->hasil}}">Klik Disini</a></td>
                                  <td>
                                    <a href="/edit/{{$p->siswa->id}}/{{$p->id}}/project" class="btn btn-primary btn-sm btn-warning">Edit</a> --}}
                                    {{-- <a href="/siswa/{{$item->id}}/{{$mapel->id}}/nilaitambah" class="btn btn-primary btn-sm">Tambah / Edit</a> --}}
                                    {{-- <a href="/siswa/{{$item->id}}/{{$mapel->id}}/hapus" class="btn btn-danger btn-sm">Hapus</a> --}}
                                    {{-- <form action="/siswa/{{$item->id}}/{{$mapel->id}}/nilaihapus" method="post" class="btn btn-danger btn-sm d-inline">
                                      @csrf
                                      @method('delete')
                                      Hapus
                                    </form> --}}
                                  {{-- </td>
                                </tr>
                              @endforeach --}}
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
                <a href="/guru/nilaiProsesKelas/{{$item->kelas}}" class="btn btn-secondary btn-sm">Kembali Ke Kelas</a>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script>
        $(document).ready(function() {
          $('.nilai').DataTable();
        } );
      </script>
      <script>
        @if (Session::has('status'))
          toastr.success("{{Session::get('status')}}", "Trimakasih")
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