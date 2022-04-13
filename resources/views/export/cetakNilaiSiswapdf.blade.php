<page_header>
    <div style="padding: 4mm; border: 1px solid" align="center">
        <span style="font-size: 25px;">
            <img src="foto/logo.png" alt="">
        </span>
    </div>
</page_header>

{{-- <!doctype html>
<html lang="en">
  <head> --}}
    <!-- Required meta tags -->
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> --}}

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        header {
            height: 100px;
            margin: 0;
            background-color: #3366cc;
        }
        
        img {
            line-height: 100px;
            width: 100px;
            height: auto;
        }
        .textHead {
            color: black;
            height: 100px;
            margin-left: 100px;
            text-align: center;
            padding-right: 10px;
            padding-left: 10px;
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
        <img src="foto/yski.png" alt="">
        <div class="textHead">
            @if ($item->unit === 'SMA')
                SMA KRISTEN YSKI SEMARANG
            @else
                SMP KRISTEN YSKI SEMARANG
            @endif
        </div>
      </header>
    <p>
        Nama  : {{$item->nama}}
        <br>
        Kelas  : {{$item->kelas}}
    </p>
    <h3 class="mt-5 soft" style="font-weight: bold">Soft Skills Project</h3>
    <table class="table table-striped table-bordered text-center table-sm mt-3">
        <thead>
            <tr class="bg-primary text-white">
                <th>No</th>
                <th>Soft Skill</th>
                <th>Nilai</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($matapelajarans as $m)
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
                    @endif
                  @endforeach
                </td>
                <td>
                  @if ($m->nama_mapel === 'Critical Thinking')
                      Problem Solving & Kedalaman Materi
                  @elseif ($m->nama_mapel === 'Creativity')
                      Desain & Kreativitas Penyampaian
                  @elseif ($m->nama_mapel === 'Communication')
                      Kejelasan & Intonasi Suara
                  @elseif ($m->nama_mapel === 'Collaboration')
                      Kerjasama dan Kemampuan beradaptasi Dalam Tim
                  @elseif ($m->nama_mapel === 'Leadership')
                      Tanggung Jawab, Kemandirian, Kedisiplinan, Inisiatif(Individu)
                  @endif
                </td>
              </tr> --}}
                {{-- <tr>
                    <td>{{$p->nama_mapel}}</td>
                    <td>{{$p->pivot->nilai}}</td>
                    <td>
                        @if ($p->nama_mapel === 'Critical Thinking')
                            Problem Solving & Kedalaman Materi
                        @elseif ($p->nama_mapel === 'Creativity')
                            Desain & Kreativitas Penyampaian
                        @elseif ($p->nama_mapel === 'Communication')
                            Kejelasan & Intonasi Suara
                        @elseif ($p->nama_mapel === 'Collaboration')
                            Kerjasama dan Kemampuan beradaptasi Dalam Tim
                        @elseif ($p->nama_mapel === 'Leadership')
                            Tanggun Jawab, Kemandirian, Kedisiplinan, Inisiatif(Individu)
                        @endif
                    </td>
                </tr> --}}
            {{-- @empty
                <tr>
                    <td colspan="6" class="text-center">
                        Data Kosong
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <table class="table table-striped table-bordered text-center table-sm mt-5">
        <thead>
            <tr class="bg-primary text-white">
                <th>No</th>
                <th>Project</th>
                <th>Nilai</th>
                <th>Pengerjaan</th>
                <th>Hasil</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->project}}</td>
                    <td>{{$p->nilai_pro}}</td>
                    <td>{{$p->pengerjaan}}</td>
                    <td><a href="{{$p->hasil}}">Klik Disini</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        Data Kosong
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>    --}}
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html> --}}