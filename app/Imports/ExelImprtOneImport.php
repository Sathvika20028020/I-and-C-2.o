<?php

namespace App\Imports;

use App\Models\ExelImprtOne;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use PhpOffice\PhpSpreadsheet\Shared\Date;


class ExelImprtOneImport implements ToModel, WithHeadingRow, WithChunkReading,WithBatchInserts,ShouldQueue
{
    public function model(array $row)
    {
        return new ExelImprtOne([
            'UdyogAadharNo'    => $row['udyogaadharno'],
            'EnterpriseName'   => $row['enterprisename'],
            'Address'          => $row['address'],
            'PINCode'          => $row['pincode'],
            'TotalEmp'         => $row['totalemp'],
            'OwnerName'        => $row['ownername'],
            'MobileNo'         => $row['mobileno'],
            'EmailId'          => $row['emailid'],
            'Gender'           => $row['gender'],
            'SocialCategory'   => $row['socialcategory'],
            'MajorActivity'    => $row['majoractivity'],
            'Dic_Name'         => $row['dic_name'],
            'IncorporationDate'=> $this->transformDate($row['incorporationdate']),
            'CommmenceDate'    => $this->transformDate($row['commmencedate']),
            'CreateDate'       => $this->transformDate($row['createdate']),
            'State'            => $row['state'],
            'District'         => $row['district'],
            'state_name'       => $row['state_name'],
            'DISTRICT_NAME'    => $row['district_name'],
            'OrganisationType' => $row['organisationtype'],
            'PreviousEMType'   => $row['previousemtype'],
            'PreviousEMNumber' => $row['previousemnumber'],
            'EnterpriseType'   => $row['enterprisetype'],
            'ActivityDetail'   => $row['activitydetail'],
            'InvestmentCost'   => $row['investmentcost'],
            'NetTurnover'      => $row['netturnover'],
            'CreateDate1'      => $this->transformDate($row['createdate1']),
            'Latitude'         => $row['latitude'],
            'Longitude'        => $row['longitude'],
        ]);
    }

    private function transformDate($value)
{
    try {
        if (is_numeric($value)) {
            return Date::excelToDateTimeObject($value)->format('Y-m-d');
        }
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
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
