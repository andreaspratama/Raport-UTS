<?php

namespace App\Exports;

use App\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuruExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Guru::all();
    }

    public function map($guru): array
    {
        return [
            $guru->nip,
            $guru->nama,
            $guru->ttd,
        ];
    }

    public function headings(): array
    {
        return [
            'NIP',
            'Nama',
            'TTD',
        ];
    }
}
