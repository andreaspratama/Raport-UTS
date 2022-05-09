<?php

namespace App\Exports;

use App\JadwalMapel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JadwalmapelExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JadwalMapel::all();
    }

    public function map($jadwalmapel): array
    {
        if ($jadwalmapel->guru == null) {
            $rguru = "Guru Terhapus";
        } else {
            $rguru = $jadwalmapel->guru->nama;
        }
        
        return [
            $rguru,
            $jadwalmapel->kelas,
            $jadwalmapel->unit,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Guru',
            'Kelas',
            'Unit',
        ];
    }
}
