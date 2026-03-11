<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection, WithHeadings
{
    protected $ids;

    public function __construct(array $ids)
    {
        $this->ids = $ids;
    }

    public function collection()
    {
         if ($this->ids && is_array($this->ids)) {
        return Employee::select(
          'id',
          'emp_name',
          'group',
          'designation',
          'reg',
          'cadre_type',
          'working_at',
          'taluk',
          'district',
          'dob',
          'doj',
          'post_held_from',
          'dor',
          'category',
          'sub_category',
          'KPSC',
          'HK',
          'DR_PR',
          'gender',
          'increment',
          'phone',
          'salutation',
          'date_of_increment'
        )->whereIn('id', $this->ids)->get();
         }
         
         return Employee::all();
    }

    public function headings(): array
    {
        return [
          'Sl No',
          'Name',
          'Group',
          'Designation',
          'Reg/ (32)',
          'Type- Ncadre/ Xcadre',
          'Working At/ As',
          'Taluk',
          'District',
          'DOB',
          'DOJ',
          'Post Held from',
          'DOR',
          'CATEGORY',
          'SUB-CASTE',
          'KPSC',
          'HK',
          'DR/PR',
          'Gender',
          'Increment',
          'Phone numbers',
          'Salutation',
          'Date of Increment',
        ];
    }
}
