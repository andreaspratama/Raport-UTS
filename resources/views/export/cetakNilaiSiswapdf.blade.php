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
        header {
            height: 155px;
            /* padding: 10px; */
            margin: 0;
            background-color: #3366cc;
        }
        
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
        <center>
            <?php
                $logos = storage_path("app/public/assets/gallery/logo-putih.png")
            ?>
            <img src="{{$logos}}" alt="">
        </center>
        <center>
            <div class="text-head-title">
                <h2>Project Based Report</h2>
            </div>
        </center>
        <center>
            <div class="text-head">
                @if ($item->unit === 'SMA')
                    <div class="unit">
                        SMA Kristen YSKI Semarang
                    </div>
                    <br>
                    <div class="unit-text">
                        Jl. Sidodadi Timur No. 23
                    </div>
                @elseif($item->unit === 'SMP')
                    <div class="unit">
                        SMP Kristen YSKI Semarang
                    </div>
                    <br>
                    <div class="unit-text">
                        Jl. Sidodadi Timur No. 23
                    </div>
                @elseif($item->unit === 'K1')
                    <div class="unit">
                        SD Kristen 1 YSKI Semarang
                    </div>
                    <br>
                    <div class="unit-text">
                        Jl. Kompol Maksum No. 280 Semarang
                    </div>
                @endif
            </div>
        </center>
      </header>
      <table style="margin-top: 15px">
            <tr>
                <td style="font-weight: bold">Student Name</td>
                <td style="font-weight: bold">:</td>
                <td style="font-weight: bold">{{$item->nama}}</td>
            </tr>
            <tr>
                <td style="font-weight: bold">Student ID Number</td>
                <td style="font-weight: bold">:</td>
                <td style="font-weight: bold">{{$item->nisn}}</td>
            </tr>
            <tr>
                @foreach ($thnakademiks as $akdm)
                    @if ($akdm->status == 'Aktif')
                        <td style="font-weight: bold">Academic Year</td>
                        <td style="font-weight: bold">:</td>
                        <td style="font-weight: bold">{{$akdm->tahun_akademik}} {{$akdm->semester}}</td>
                    @endif
                @endforeach
            </tr>
      </table>
    <h3 class="mt-4 soft" style="font-weight: bold">Soft Skills Project</h3>
    <table class="table table-striped table-bordered text-center table-sm mt-3" width="100%">
        <thead>
            <tr class="bg-primary text-white">
                <th width="4%">No</th> 
                <th width="23%">Aspek</th>
                <th width="6%">Nilai</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mapel as $m)
                            <tr>
                              <td>{{$loop->iteration}}</td>
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
                            </tr>
                            @endforeach
        </tbody>
    </table>
    <h3 class="mt-5 soft" style="font-weight: bold">Project</h3>
    <table class="table table-striped table-bordered text-center table-sm mt-3">
        <thead>
            <tr class="bg-primary text-white">
                <th>No</th>
                <th>Project</th>
                <th>Nilai</th>
                <th>Pengerjaan Project</th>
                <th>Hasil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $p)
                              <tr>
                                <td>{{$loop->iteration}}</td>
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
                                    {{$pro->pivot->task}}
                                  @endforeach
                                </td>
                                <td>
                                  @foreach ($item->project as $pro)
                                    <a href="{{$pro->pivot->hasil}}">Klik Untuk Melihat Hasil</a>
                                  @endforeach
                                </td>
                              </tr>
                            @endforeach
        </tbody>
    </table>   

    <footer>
        <div class="ttd mt-5" style="text-align: right">
            <p style="margin-right: 30px">Semarang, {{$tanggal}}</p>
            <?php
                // $j = ;
                $foto = storage_path("app/public/" . Auth::user()->guru->ttd);
            ?>
            <p style="margin-right: 25px"><img src="{{$foto}}" alt=""></p>
            <p style="margin-top: -15px; margin-right: 30px">{{Auth::user()->name}}</p>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>