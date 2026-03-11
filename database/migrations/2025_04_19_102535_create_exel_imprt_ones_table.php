<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exel_imprt_ones', function (Blueprint $table) {
            $table->id();
            $table->string('UdyogAadharNo');
            $table->string('EnterpriseName');
            $table->string('Address');
            $table->string('PINCode');
            $table->string('TotalEmp');
            $table->string('OwnerName');
            $table->string('MobileNo');
            $table->string('EmailId');
            $table->string('Gender');
            $table->string('SocialCategory');
            $table->string('MajorActivity');
            $table->string('Dic_Name');
            $table->string('IncorporationDate');
            $table->string('CommmenceDate');
            $table->string('CreateDate');
            $table->string('State');
            $table->string('District');
            $table->string('state_name');
            $table->string('DISTRICT_NAME');
            $table->string('OrganisationType');
            $table->string('PreviousEMType');
            $table->string('PreviousEMNumber');
            $table->string('EnterpriseType');
            $table->string('ActivityDetail');
            $table->string('InvestmentCost');
            $table->string('NetTurnover');
            $table->string('CreateDate1');
            $table->string('Latitude');
            $table->string('Longitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exel_imprt_ones');
    }
};
