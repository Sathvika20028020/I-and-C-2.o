<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class AttendanceExport implements FromArray, WithHeadings
{
    use Exportable;

    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'Person ID',
            'Department',
            'Name',
            'Attendance Date',
            'Status',
            'Check In',
            'Check Out',
            'Late Minutes',
            'Early Leave Minutes',
        ];
    }
}