<?php

namespace App\Exports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::all();
    }

    public function map($siswa): array
    {
        return [
            $siswa->nisn,
            $siswa->nama,
            $siswa->unit,
            $siswa->kelas,
            $siswa->created_at,
            $siswa->updated_at,
        ];
    }

    public function headings(): array
    {
        return [
            'NISN',
            'Nama',
            'Unit',
            'Kelas',
            'Tanggal Dibuat',
            'Tanggal Diupdate'
        ];
    }
}
