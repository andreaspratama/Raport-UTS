<?php

namespace App\Imports;

use App\Jadwalmapel;
use App\Mapel;
use App\Guru;
use Maatwebsite\Excel\Concerns\ToModel;

class JadmapImport implements ToModel
{
    private $mapel;
    private $guru;

    public function __construct()
    {
        $this->mapel = Mapel::select('id', 'kode_mapel', 'nama_mapel')->get();
        $this->guru = Guru::select('id', 'nama', 'nip')->get();
    }

    public function model(array $row)
    {
        $mapel = $this->mapel->where('nama_mapel', $row[2])->first();
        $guru = $this->guru->where('nama', $row[1])->first();
        return new Jadwalmapel([
            'guru_id' => $guru->id ?? NULL,
            'mapel_id' => $mapel->id ?? NULL,
            'unit' => $row[3],
            'kelas' => $row[4],
        ]);
    }
}
// namespace App\Imports;

// use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;
// use App\Jadmap;
// use App\User;

// class JadmapImport implements ToCollection
// {
//     /**
//     * @param Collection $collection
//     */
//     public function collection(Collection $collection)
//     {
//         // dd($collection);
//         foreach ($collection as $row) {
//             Jadmap::create([
//                 'nisn' => $row[1],
//                 'nama' => $row[2],
//                 'tpt_lahir' => $row[3],
//                 'tgl_lahir' => gmdate('Y-m-d', $row[4]),
//                 'jns_kelamin' => $row[5],
//                 'agama' => $row[6],
//                 'alamat' => $row[7],
//                 'nama_ortu' => $row[8],
//                 'kelas' => $row[9],
//                 'asal_sklh' => $row[10],
//                 'image' => 'text',
//                 'user_id' => 1,
//             ]);
//             User::create([
//                 'name' => $row[2],
//                 'username' => $row[1],
//                 'password' => $row[1],
//                 'remember_token' => 'text',
//                 'role' => 'jadmap',
//                 'image' => 'text'
//             ]);

//         }
//     }
// }
