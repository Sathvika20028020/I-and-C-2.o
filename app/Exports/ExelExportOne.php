<?php

namespace App\Exports;
use App\Models\ExelImprtOne;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;


class ExelExportOne implements FromCollection, WithHeadings
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
        return ExelImprtOne::whereIn('id', $this->ids)->get();
    }

    /**
     * Define the headings for the exported file.
     *
     * @return array
     */

    public function headings(): array
    {
        return [
            'Sl No',
            'UdyogAadharNo',
            'EnterpriseName',
            'Address',
            'PINCode',
            'TotalEmp',
            'OwnerName',
            'MobileNo',
            'EmailId',
            'Gender',
            'SocialCategory',
            'MajorActivity',
            'Dic_Name',
            'IncorporationDate',
            'CommmenceDate',
            'CreateDate',
            'State',
            'District',
            'state_name',
            'DISTRICT_NAME',
            'OrganisationType',
            'PreviousEMType',
            'PreviousEMNumber',
            'EnterpriseType',
            'ActivityDetail',
            'InvestmentCost',
            'NetTurnover',
            'CreateDate1',
            'Latitude',
            'Longitude',
            'created_at',
            'updated_at',
        ];
    }

}