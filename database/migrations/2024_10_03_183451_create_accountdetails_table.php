<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountdetails', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->String('ven_gst_category');
            $table->String('pan_num');
            $table->String('pan_hol_name');
            $table->String('pan_father_name');
            $table->String('pan_hol_dob');
            $table->longText('address');   
            $table->String('pincode');
            $table->String('acc_num');
            $table->String('ifsc_code');
            $table->String('beneficary_name');
            $table->String('service_type');
            $table->String('user_id');
            $table->String('user_type');
            $table->enum('status',['3','2','1','0'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accountdetails');
    }
};
