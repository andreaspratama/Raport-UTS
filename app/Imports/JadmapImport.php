<?php

namespace App\Imports;

use App\Jadwalmapel;
use App\Mapel;
use App\Guru;
use Maatwebsite\Excel\Concerns\ToModel;

class JadmapImport implements ToModel
{
    private $guru;

    public function __construct()
    {
        $this->guru = Guru::select('id', 'nama', 'nip')->get();
    }

    public function model(array $row)
    {
        $guru = $this->guru->where('nama', $row[0])->first();
        return new Jadwalmapel([
            'unit' => $row[2],
            'kelas' => $row[1],
            'guru_id' => $guru->id ?? NULL,
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
