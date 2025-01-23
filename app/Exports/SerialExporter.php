<?php

namespace App\Exports;

use App\Models\Serial;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SerialExporter implements FromCollection,WithCustomCsvSettings, WithHeadings, WithHeadingRow
 {

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }


    public function collection()

    {
        return $this->data;

    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return [
            '#ID',
            'Serial',
            'Start Date',
            'End Date',
        ];
    }

}
