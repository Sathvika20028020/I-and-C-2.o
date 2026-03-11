<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class EmployeeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
          'emp_name'                  => $row['name'],
          'group'                     => $row['group']?? null,
          'designation'               => $row['designation']?? null,
          'reg'                       => $row['reg_32']?? null,
          'cadre_type'                => $row['type_ncadre_xcadre']?? null,
          'working_at'                => $row['working_at_as']?? null,
          'taluk'                     => $row['taluk']?? null,
          'district'                  => $row['district']?? null,
          'dob'                       => isset($row['dob']) ? $this->transformDate($row['dob']) : null,
          'doj'                       => isset($row['doj']) ? $this->transformDate($row['doj']) : null,
          'post_held_from'            => isset($row['post_held_from']) ? $this->transformDate($row['post_held_from']) : null,
          'dor'                       => isset($row['dor']) ? $this->transformDate($row['dor']) : null,
          'category'                  => $row['category']?? null,
          'sub_category'              => $row['sub_caste']?? null,
          'KPSC'                      => $row['kpsc']?? null,
          'HK'                        => $row['hk']?? null,
          'DR_PR'                     => $row['drpr']?? null,
          'increment'                 => $row['increment']?? null,
          'gender'                    => $row['gender']?? null,
          'phone'                     => $row['phone_numbers']?? null,
          'salutation'                => $row['salutation']?? null,
          'date_of_increment'         => isset($row['date_of_increment']) ? $this->transformDate($row['date_of_increment']) : null,
          'kgid'                      => $row['kgid']?? null,
        ]);
    }

    private function transformDate($value)
{
    try {
      if($value){
        if (is_numeric($value)) {
            return Date::excelToDateTimeObject($value)->format('Y-m-d');
        }
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
      } return null;
    } catch (\Exception $e) {
        return null; // or log error
    }
}


    public function chunkSize(): int
    {
        return 1000; 
    }

    public function batchSize(): int
    {
        return 1000;
    }
}

