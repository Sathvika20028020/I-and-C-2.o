<?php

namespace App\Imports;

use App\Models\ExelImprtTwo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;


class ExelImprtTwoImport implements ToModel, WithHeadingRow, WithChunkReading , WithBatchInserts , 
ShouldQueue , WithCalculatedFormulas ,SkipsEmptyRows

{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
      try {
        \Log::info('Processing row:', $row);
       
        return new ExelImprtTwo([
            'district'    => $row['district'],
            'divisions'   => $row['divisions'],
            'kannadiga_g1' => $row['kannadiga_g1'],
            'others_g1'          => $row['others_g1'],
            'total_g1'         => $row['total_g1'],
            'percent_g1'        => $row['percent_g1'],
            'kannadiga_g2'         => $row['kannadiga_g2'],
            'others_g2'          => $row['others_g2'],
            'total_g2'           => $row['total_g2'],
            'percent_g2'   => $row['percent_g2'],
            'kannadiga_g3'    => $row['kannadiga_g3'],
            'others_g3'         => $row['others_g3'],
            'total_g3'=> $row['total_g3'],
            'percent_g3' => $row['percent_g3'],
            'kannadiga_g4' => $row['kannadiga_g4'],
            'others_g4'   => $row['others_g4'],
            'total_g4'         => $row['total_g4'],
            'percent_g4'       => $row['percent_g4'],
            'total_kannadiga'    => $row['total_kannadiga'],
            'others_total' => $row['others_total'],
            'total'   => $row['total'],
            'percentage' => $row['percentage'],
          
        ]);
    }
    catch (\Exception $e) {
        \Log::error('Import error: ' . $e->getMessage());
        return null; // important: return null to skip on error
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
