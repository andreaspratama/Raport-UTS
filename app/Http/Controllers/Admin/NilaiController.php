<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\Mapel;
use App\Siswa;
use App\Jadwalmapel;
use App\Thnakademik;
use App\User;
use Illuminate\Http\Request;
use PDF;
use App\Exports\AbsensiswaExport;

class NilaiController extends Controller
{
    public function index()
    {
        $items = Jadwalmapel::all();

        return view('pages.admin.siswa.masuknilai', compact('items'));
    }

    public function proses($kelas)
    {
        $pnilai = Siswa::all()->whereBetween('kelas', [$kelas]);

        return view('pages.admin.siswa.prosnilai', compact('pnilai'));
    }

    public function prosesDua($kelas)
    {
        $pnilai = Siswa::all()->whereBetween('kelas', [$kelas]);
        $mapel = Mapel::all();

        return view('pages.admin.siswa.prosnilaibaru', compact('pnilai', 'mapel'));
    }

    public function detail($id)
    {
        $item = Siswa::findOrFail($id);
        $matapelajarans = Mapel::all();
        $thnakademiks = Thnakademik::all();

        return view('pages.admin.siswa.tambahnilai', compact('item', 'matapelajarans', 'thnakademiks'));
    }

    public function detailNilai($id)
    {
        $item = Siswa::findOrFail($id);
        $matapelajarans = Mapel::all();
        $thnakademiks = Thnakademik::all();

        return view('pages.admin.siswa.detailNilai', compact('item', 'matapelajarans', 'thnakademiks'));
    }

    public function nilai(Request $request, $id)
    {
        // dd($request->all());
        $siswa = Siswa::findOrFail($id);
        // $siswa['portofolio'] = $request->file('portofolio')->store(
        //     'assets/porto', 'public'
        // );
        
        $siswa->mapel()->attach($request->mapel, ['thnakademik' => $request->thnakademik, 'nilai_uh1' => $request->nilai_uh1, 'nilai_uh2' => $request->nilai_uh2, 'uts' => $request->uts, 'uas' => $request->uas, 'status' => $request->status, 'portofolio' => $data['portofolio'] = request()->file('portofolio')->store('assets/porto', 'public')]);

        // $siswa->thnakademik()->attach($request->thnakademik);

        return redirect('siswa/'.$id.'/nilai')->with('status', 'Nilai Berhasil Ditambahkan');

        // $siswa = Siswa::findOrFail($id);
        // $siswa->mapel()->attach($request->mapel, ['thnakademik_id' => $request->thnakademik_id, 'nilai_uh1' => $request->nilai_uh1, 'nilai_uh2' => $request->nilai_uh2, 'uts' => $request->uts, 'uas' => $request->uas, 'status' => $request->status]);

        // $siswa->thnakademik()->attach($request->thnakademik_id);

        // return redirect('siswa/'.$id.'/nilai')->with('status', 'Nilai Berhasil Ditambahkan');
    }

    public function nilaitambah($id, $idmapel)
    {
        $item = Siswa::findOrFail($id);
        $nilai = $item->mapel()->findOrFail($idmapel);
        $mapel = Mapel::all();

        return view('pages.admin.siswa.editnilai', [
            'item' => $item,
            'nilai' => $nilai,
            'mapel' => $mapel
        ]);
    }

    public function nilaiupdate(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id); 
        $siswa->mapel()->updateExistingPivot($request->mapel, ['nilai_uh1' => $request->nilai_uh1, 'nilai_uh2' => $request->nilai_uh2, 'uts' => $request->uts, 'uas' => $request->uas, 'status' => $request->status]);

        // dd($siswa);

        return redirect('siswa/'.$id.'/nilai')->with('status', 'Nilai Berhasil Ditambahkan');
    }

    public function nilaihapus($id, $idmapel)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->mapel()->detach($idmapel);

        return redirect('siswa/'.$id.'/nilai')->with('status', 'Nilai Berhasil Dihapus');
    }

    public function cetakNilai($id)
    {
        $data = Siswa::findOrFail($id);
        $items = Thnakademik::all();
        return view('pages.admin.siswa.cetakNilaiSiswa', compact('items', 'data'));
    }

    public function cetakNilaiPeraka($id)
    {
        $item = Siswa::findOrFail($id);
        $matapelajarans = Mapel::all();

        // return view('pages.admin.siswa.new', compact('cetakPeraka', 'data', 'matapelajarans'));

        $pdf = PDF::loadview('export.cetakNilaiSiswapdf', compact('matapelajarans', 'item'));
        return $pdf->download('laporan-absen.pdf');
    }

    public function cetakNilaiIndividu($id, $idmapel)
    {
        $item = Siswa::findOrFail($id);
        $nilai = $item->mapel()->findOrFail($idmapel);
        $mapel = Mapel::all();

        $pdf = PDF::loadview('export.cetakNilaiIndividupdf', compact('nilai', 'item', 'mapel'));
        return $pdf->download('laporan-absen.pdf');

        // return view('pages.admin.siswa.editnilai', [
        //     'item' => $item,
        //     'nilai' => $nilai,
        //     'mapel' => $mapel
        // ]);
    }
}
