<?php

namespace App\Exports;
use App\Models\ExelImprtTwo;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;


class ExelExportTwo implements FromCollection, WithHeadings
{
    /**
     * Fetch the data to be exported.
     *
     * @return \Illuminate\Support\Collection
     */

     protected $ids;

    public function __construct(array $ids)
    {
        $this->ids = $ids;
    }

    public function collection()
    {
        return ExelImprtTwo::whereIn('id', $this->ids)->get();
    }

    /**
     * Define the headings for the exported file.
     *
     * @return array
     */

    public function headings(): array
    {
        return [
            'ಕ್ರ.ಸಂ.',
            'ಜಿಲ್ಲೆ',
            'ಘಟಕಗಳು',
            'ಕನ್ನಡಿಗರು',
            'ಇತರರು',
            'ಒಟ್ಟು',
            'ಶೇ%',
            'ಕನ್ನಡಿಗರು',
            'ಇತರರು',
            'ಒಟ್ಟು',
            'ಶೇ%',
            'ಕನ್ನಡಿಗರು',
            'ಇತರರು',
            'ಒಟ್ಟು',
            'ಶೇ%',
            'ಕನ್ನಡಿಗರು',
            'ಇತರರು',
            'ಒಟ್ಟು',
            'ಶೇ%',
            'ಕನ್ನಡಿಗರು',
            'ಇತರರು',
            'ಒಟ್ಟು',
            'ಶೇ%',
            'created_at',
            'updated_at',
        ];
    }

}