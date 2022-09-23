<?php

namespace App\Imports;

use App\Jadwalmapel;
use App\Mapel;
use App\Guru;
use Maatwebsite\Excel\Concerns\ToModel;

class JadwalImport implements ToModel
{
    private $guru;

    public function __construct()
    {
        $this->guru = Guru::select('id', 'nama', 'email')->get();
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
