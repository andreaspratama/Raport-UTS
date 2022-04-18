<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\Mapel;
use App\Siswa;
use App\Jadwalmapel;
use App\Thnakademik;
use App\User;
use App\Sekolah;
use App\Project;
use Illuminate\Http\Request;
use PDF;
use App\Exports\AbsensiswaExport;
use Spipu\Html2Pdf\Html2pdf;

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
        $mapel = Mapel::all();
        $thnakademiks = Thnakademik::all();
        $projects = Project::all();

        return view('pages.admin.siswa.tambahnilai', compact('item', 'mapel', 'thnakademiks', 'projects'));
    }

    public function detailNilai($id)
    {
        $item = Siswa::findOrFail($id);
        $mapel = Mapel::all();
        $thnakademiks = Thnakademik::all();
        $projects = Project::where('siswa_id', $id)->get();

        return view('pages.admin.siswa.detailNilai', compact('item', 'mapel', 'thnakademiks', 'projects'));
    }

    public function nilai(Request $request, $id)
    {
        // dd($request->all());
        $siswa = Siswa::findOrFail($id);
        // $siswa['portofolio'] = $request->file('portofolio')->store(
        //     'assets/porto', 'public'
        // );
        
        $siswa->mapel()->attach($request->mapel, ['thnakademik' => $request->thnakademik, 'nilai' => $request->nilai, 'project' => $request->project, 'nilai_pro' => $request->nilai_pro, 'task' => $request->task, 'hasil' => $request->hasil]);

        // $siswa->thnakademik()->attach($request->thnakademik);

        return redirect('siswa/'.$id.'/nilai')->with('status', 'Nilai Berhasil Ditambahkan');

        // $siswa = Siswa::findOrFail($id);
        // $siswa->mapel()->attach($request->mapel, ['thnakademik_id' => $request->thnakademik_id, 'nilai_uh1' => $request->nilai_uh1, 'nilai_uh2' => $request->nilai_uh2, 'uts' => $request->uts, 'uas' => $request->uas, 'status' => $request->status]);

        // $siswa->thnakademik()->attach($request->thnakademik_id);

        // return redirect('siswa/'.$id.'/nilai')->with('status', 'Nilai Berhasil Ditambahkan');
    }

    public function nilaitambahproject($id, $idproject)
    {
        $item = Siswa::findOrFail($id);
        // $nilai = $item->mapel()->findOrFail($idmapel);
        $project = Project::findOrFail($idproject);
        $thnakademiks = Thnakademik::all();

        return view('pages.admin.siswa.inputnilaiproject', [
            'item' => $item,
            'project' => $project,
            'thnakademiks' => $thnakademiks
        ]);
    }

    public function nilaitambah($id, $idmapel)
    {
        $item = Siswa::findOrFail($id);
        // $nilai = $item->mapel()->findOrFail($idmapel);
        $mapel = Mapel::findOrFail($idmapel);
        $thnakademiks = Thnakademik::all();

        return view('pages.admin.siswa.inputnilai', [
            'item' => $item,
            'mapel' => $mapel,
            'thnakademiks' => $thnakademiks
        ]);
    }

    public function nilaiedit($id, $idmapel)
    {
        $item = Siswa::findOrFail($id);
        $isi = $item->mapel()->findOrFail($idmapel);
        $mapel = Mapel::findOrFail($idmapel);
        $thnakademiks = Thnakademik::all();

        return view('pages.admin.siswa.editnilai', [
            'item' => $item,
            'mapel' => $mapel,
            'thnakademiks' => $thnakademiks,
            'isi' => 'isi'
        ]);
    }

    public function nilaieditproject($id, $idproject)
    {
        $item = Siswa::findOrFail($id);
        // $nilai = $item->mapel()->findOrFail($idmapel);
        $isi = $item->project()->findOrFail($idproject);
        $project = Project::findOrFail($idproject);
        $thnakademiks = Thnakademik::all();

        return view('pages.admin.siswa.editnilaiproject', [
            'item' => $item,
            'project' => $project,
            'isi' => $isi,
            'thnakademiks' => $thnakademiks
        ]);
    }

    public function nilaiupdate(Request $request, $id, $idmapel)
    {
        $item = Siswa::findOrFail($id);
        $mapel = Mapel::findOrFail($idmapel);

        $item->mapel()->attach($mapel, ['nilai' => $request->nilai]);
        
        // $siswa = Siswa::findOrFail($id);

        // $siswa->mapel()->updateExistingPivot($request->mapel, ['nilai' => $request->nilai]);

        // dd($siswa);

        return redirect('siswa/'.$id.'/nilai')->with('status', 'Nilai Berhasil Ditambahkan');
    }

    public function nilaiupdateproject(Request $request, $id, $idproject)
    {
        $item = Siswa::findOrFail($id);
        $project = Project::findOrFail($idproject);

        $item->project()->attach($project, ['nilai' => $request->nilai, 'task' => $request->task, 'hasil' => $request->hasil]);
        
        // $siswa = Siswa::findOrFail($id);

        // $siswa->mapel()->updateExistingPivot($request->mapel, ['nilai' => $request->nilai]);

        // dd($siswa);

        return redirect('siswa/'.$id.'/nilai')->with('status', 'Nilai Berhasil Ditambahkan');
    }

    public function editnilaiupdate(Request $request, $id, $idmapel)
    {
        $item = Siswa::findOrFail($id);
        $mapel = Mapel::findOrFail($idmapel);

        $item->mapel()->updateExistingPivot($mapel, ['nilai' => $request->nilai]);
        
        // $siswa = Siswa::findOrFail($id);

        // $siswa->mapel()->updateExistingPivot($request->mapel, ['nilai' => $request->nilai]);

        // dd($siswa);

        return redirect('siswa/'.$id.'/nilai')->with('status', 'Nilai Berhasil Ditambahkan');
    }

    public function editnilaiupdateproject(Request $request, $id, $idproject)
    {
        $item = Siswa::findOrFail($id);
        $project = Project::findOrFail($idproject);

        $item->project()->updateExistingPivot($project, ['nilai' => $request->nilai, 'task' => $request->task, 'hasil' => $request->hasil]);
        
        // $siswa = Siswa::findOrFail($id);

        // $siswa->mapel()->updateExistingPivot($request->mapel, ['nilai' => $request->nilai]);

        // dd($siswa);

        return redirect('siswa/'.$id.'/nilai')->with('status', 'Nilai Berhasil Ditambahkan');
    }

    public function editproject($id, $idproject)
    {
        $item = Siswa::findOrFail($id);
        $pro = $item->project()->findOrFail($idproject);

        return view('pages.admin.siswa.editnilaiproject', [
            'item' => $item,
            'pro' => $pro
        ]);
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
        // $html2pdf = new Html2Pdf('P', 'A4', 'en');
        // $html2pdf->writeHtml(view('export.cetakNilaiSiswapdf'));
        // $html2pdf->output();   
        $item = Siswa::findOrFail($id);
        $mapel = Mapel::all();
        $thnakademiks = Thnakademik::all();
        $projects = Project::all();
        $sekolah = Sekolah::all();
        $tanggal = date("d-m-Y");

        // return view('pages.admin.siswa.new', compact('cetakPeraka', 'data', 'matapelajarans'));

        $pdf = PDF::loadview('export.cetakNilaiSiswapdf', compact('mapel', 'item', 'sekolah', 'projects', 'thnakademiks', 'tanggal'));
        // return $pdf->download('laporan-absen.pdf');
        return $pdf->stream();
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
