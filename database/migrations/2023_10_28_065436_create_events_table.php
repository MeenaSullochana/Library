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
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('eventTitle');
            $table->string('contactPersonName');
            $table->string('startDate');
            $table->string('startTime');
            $table->string('clossingDate');
            $table->string('clossingTime');
            $table->string('mobileNumber'); 
            $table->string('email');
            $table->string('location');
            $table->string('website');
            $table->string('description');
            $table->string('district');
            $table->string('address');
            $table->string('comment'); 
            $table->enum('status',['1','0'])->default('1');
            $table->string('createdBy');
            $table->string('creater');  
            $table->string('emergencyContactnName'); 
            $table->string('emergencyMobileNumber'); 
            $table->string('emergencyDesignation'); 
            $table->string('authorityContactnName'); 
            $table->string('authorityMobileNumber'); 
            $table->string('authorityDesignation'); 
            $table->string('applyFromDate'); 
            $table->string('applyToDate'); 
            $table->string('totalStall'); 
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
        Schema::table('events', function (Blueprint $table) {
           
        });
    }
};
