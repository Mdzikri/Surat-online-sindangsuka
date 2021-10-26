<?php

namespace App\Exports;

use App\Ajuan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AjuansExport implements FromQuery, WithMapping, ShouldAutoSize, WithStyles, WithHeadingRow
{
    /**
     * @var Ajuan $ajuan
     */
    public function map($ajuan): array
    {
        return [
            $ajuan->updated_at->format('d-m-y'),
            $ajuan->jenis,
            $ajuan->nosurat,
            $ajuan->user->nama,
            $ajuan->user->alamat,
            $ajuan->kades,
        ];
    }

    public function query()
    {
        return Ajuan::query()->where('acc', 1);
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }
}
