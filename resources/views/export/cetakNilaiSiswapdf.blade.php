<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> --}}
    <style>        
        img {
            /* line-height: 100px; */
            width: 150px;
            margin-top: -10px;
        }

        .text-head-title {
            font-family: 'Poppins', sans-serif;
            color: #fff;
            font-weight: bold;
            margin-top: -40px;
        }

        .text-head {
            /* margin-top: ; */
            color: #fff;
        }

        .text-head .unit {
            font-size: 18px;
            font-weight: lighter;
        }

        .text-head .unit-text {
            font-size: 14px;
            margin-top: -27px;
            font-weight: lighter;
        }

        h3 {
            font-size: 18px;
            text-align: center;
        }

        .soft{
            text-align: left;
        }
    </style>

    <title>Data Nilai Siswa</title>
  </head>
  <body>
      <header>
        <?php
            $logos = storage_path("app/public/assets/logo.png")
        ?>
        <img src="{{$logos}}" alt="" style="width: 70px; position: absolute; height: auto">
        <table style="width: 100%">
            <tr>
                <td align="center">
                    <span style="line-height: 1.6; font-weight: bold; font-size: 20px">
                        Laporan Hasil Belajar Tengah Semester
                    </span>
                </td>
            </tr>
        </table>
      </header>
      <table style="margin-top: 50px; width: 60%; position:absolute;">
        <tr>
            <td style="font-weight: bold; width:128px; font-size:14px">Nama Siswa</td>
            <td style="font-weight: bold; width:10px; font-size:14px">:</td>
            <td style="font-weight: bold; font-size:14px">{{$item->nama}}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; font-size:14px">Nomor Induk</td>
            <td style="font-weight: bold; font-size:14px">:</td>
            <td style="font-weight: bold; font-size:14px">{{$item->nisn}}</td>
        </tr>
        <tr>
            <td style="font-weight: bold; font-size:14px">Nama Sekolah</td>
            <td style="font-weight: bold; font-size:14px">:</td>
            @if ($item->unit == 'K1')
                <td style="font-weight: bold; font-size:14px">SD Kristen 1 YSKI</td>
            @elseif($item->unit == 'K2')
                <td style="font-weight: bold; font-size:14px">SD Kristen 2 YSKI</td>
            @elseif($item->unit == 'K3')
                <td style="font-weight: bold; font-size:14px">SD Kristen 3 YSKI</td>
            @endif
        </tr>
        <tr>
            <td style="font-weight: bold; font-size:14px">Alamat Sekolah</td>
            <td style="font-weight: bold; font-size:14px">:</td>
            @if ($item->unit == 'K1')
                <td style="font-weight: bold; font-size:14px">Jl. Kompol Maksum No.280 Semarang</td>
            @elseif($item->unit == 'K2')
                <td style="font-weight: bold; font-size:14px">Jl. Dokter Cipto No.109 Semarang</td>
            @elseif($item->unit == 'K3')
                <td style="font-weight: bold; font-size:14px">Jl. Tanjung No.14 Semarang</td>
            @endif
        </tr>
      </table>
      <table style="margin-top: 28px; position: absolute; width: 40%;" align="right">
            <tr>
                <td style="font-weight: bold; width:130px; font-size:14px">Kelas</td>
                <td style="font-weight: bold; width:10px; font-size:14px">:</td>
                @if ($item->kelas == '4A')
                    <td style="font-weight: bold; font-size:14px">IVA (empat)</td>
                @elseif($item->kelas == '4B')
                    <td style="font-weight: bold; font-size:14px">IVB (empat)</td>
                @elseif($item->kelas == '4C')
                    <td style="font-weight: bold; font-size:14px">IVC (empat)</td>
                @elseif($item->kelas == '1A')
                    <td style="font-weight: bold; font-size:14px">IA (satu)</td>
                @elseif($item->kelas == '1B')
                    <td style="font-weight: bold; font-size:14px">IB (satu)</td>
                @endif
            </tr>
            <tr>
                <td style="font-weight: bold; font-size:14px">Semester</td>
                <td style="font-weight: bold; font-size:14px">:</td>
                <td style="font-weight: bold; font-size:14px">1 (Satu)</td>
            </tr>
            <tr>
                @foreach ($thnakademiks as $akdm)
                    @if ($akdm->status == 'Aktif')
                        <td style="font-weight: bold; font-size:14px">Tahun Pelajaran</td>
                        <td style="font-weight: bold; font-size:14px">:</td>
                        <td style="font-weight: bold; font-size:14px">{{$akdm->tahun_akademik}}</td>
                    @endif
                @endforeach
            </tr>
      </table>
      <table class="table table-bordered text-center nilai; font-size:14px" id="dataTable" width="100%" cellspacing="0" style="margin-top: 130px;" border="1px solid rgb(126, 126, 126)">
        <thead style="background-color: rgb(126, 126, 126)">
          <tr style="height: 10px">
            <th style="width: 5%; text-center;">No</th>
            <th style="width: 70%; text-center;">Muatan Pelajaran</th>
            <th>Nilai</th>
            <th>Predikat</th>
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
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <table class="table table-bordered text-center nilai" id="dataTable" width="100%" cellspacing="0" style="font-size:14px">
        <tbody>
          <tr>
            <td style="width: 6%; text-center;">8</td>
            <td style="width: 70%; text-center;">Seni dan Budaya</td>
            <td>Nilai</td>
            <td>Predikat</td>
          </tr>
        </tbody>
        <tbody>
          @foreach ($seni as $s)
            <tr>
                <td></td>
              <td>
                {{$s->nama}}
              </td>
              <td>
                @foreach ($item->seni as $sn)
                    @if ($s->id === $sn->pivot->seni_id)
                      {{$sn->pivot->nilai}}
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
                @foreach ($item->seni as $sn)
                  @if ($s->id === $sn->pivot->seni_id)
                    @if ($sn->pivot->nilai >= 86)
                        A
                    @elseif ($sn->pivot->nilai >= 71)
                        B
                    @elseif ($sn->pivot->nilai >= 56)
                        C
                    @elseif ($sn->pivot->nilai <=55)
                        D
                    @endif
                  @endif
                @endforeach
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
      <table class="table table-bordered text-center nilai" id="dataTable" width="100%" cellspacing="0" style="font-size:14px">
        <tbody>
          <tr>
            <td style="width: 6%; text-center;">9</td>
            <td style="width: 70%; text-center;">Muatan Lokal</td>
            <td>Nilai</td>
            <td>Predikat</td>
          </tr>
        </tbody>
        <tbody>
          @foreach ($projects as $p)
            <tr>
                <td></td>
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
      <table class="table table-bordered text-center nilai" id="dataTable" width="100%" cellspacing="0" style="font-size:14px">
        <thead>
          <tr>
            <th style="width: 50%">Ketidakhadiran</th>
            <th style="width: 50%">Hari</th>
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
            </tr>
          @endforeach
        </tbody>
      </table>
      <br>
    <footer>
        <?php
                    // $j = ;
                    $foto = storage_path("app/public/" . Auth::user()->guru->ttd);
                ?>
            <p style="text-align:right; font-size:14px">Semarang, {{$tanggal}}</p>
             <table style="width: 50%; position:absolute; font-size:14px" align="left">
                <tr>
                    <td>Mengetahui Orang Tua,</td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <br>
                        <br>
                        <br>
                        .......................................
                    </td>
                </tr>
              </table>
              <table style="position: absolute; width: 50%; text-align:right; font-size:14px" align="right">
                    <tr>
                        <td>Wali Kelas</td>
                    </tr>
                    <tr>
                        <td><img src="{{$foto}}" alt="" style="margin-top:10px"></td>
                    </tr>
                    <tr>
                        <td>{{Auth::user()->name}}</td>
                    </tr>
              </table>
        <div class="ttd mt-5" style="text-align: right">
            
            {{-- <span class="guru" style="width: 50%; background-color: red; position:absolute">
                <?php
                    // $j = ;
                    $foto = storage_path("app/public/" . Auth::user()->guru->ttd);
                ?>
                <p style="margin-top: 15px; margin-right: 30px">Wali Kelas</p>
                <p style="margin-right: 25px"><img src="{{$foto}}" alt=""></p>
                <p style="margin-top: -15px; margin-right: 30px">{{Auth::user()->name}}</p>
            </span>
            <span class="ortu" style="width: 30%; position:absolute; background-color:aqua; height: 30%" align="right">
                <p style="margin-top: 15px; margin-right: 30px">Wali Kelas</p>
                <p style="margin-right: 25px"><img src="{{$foto}}" alt=""></p>
                <p style="margin-top: -15px; margin-right: 30px">{{Auth::user()->name}}</p>
            </span> --}}
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>