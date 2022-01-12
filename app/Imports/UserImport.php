<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    public function model(array $row)
    {
        $rem = Str::random(60);
        return new User([
            'name' => $row[1],
            'username' => $row[2],
            'password' => bcrypt($row[2]),
            'remember_token' => $rem,
            'role' => $row[3]
        ]);
    }
}
// namespace App\Imports;

// use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;
// use App\Siswa;
// use App\User;

// class SiswaImport implements ToCollection
// {
//     /**
//     * @param Collection $collection
//     */
//     public function collection(Collection $collection)
//     {
//         // dd($collection);
//         foreach ($collection as $row) {
//             Siswa::create([
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
//                 'role' => 'siswa',
//                 'image' => 'text'
//             ]);

//         }
//     }
// }
