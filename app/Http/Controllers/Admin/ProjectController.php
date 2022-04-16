<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Requests\Admin\ProjectRequest;
use App\Siswa;
use App\Jadwalmapel;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Project::all();

        return view('pages.admin.karya.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.karya.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Project::create($data);

        return redirect()->route('project.index')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Project::findOrFail($id);

        return view('pages.admin.karya.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Project::findOrFail($id);
        $item->update($data);

        return redirect()->route('project.index')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $item = Project::findOrFail($id);
        // $item->delete();

        // Jadwalproject::where('project_id', $id)->delete();

        // return redirect()->route('project.index')->with('status', 'Data Berhasil Dihapus');
    }

    public function hapus($id)
    {
        $item = Project::findOrFail($id);
        $item->delete();

        return redirect()->route('project.index')->with('status', 'Data Berhasil Dihapus');
    }

    // public function hapusnilai($id)
    // {
    //     $nilai = Project::findOrFail($id);
    //     $nilai->delete();

    //     return redirect('siswa/'.$id.'/show')->with('status', 'Nilai Berhasil Dihapus');
    // }
}
