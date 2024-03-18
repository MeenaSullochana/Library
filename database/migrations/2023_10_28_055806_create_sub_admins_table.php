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
        Schema::create('sub_admins', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('userName');
            $table->string('designation');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('postalCode');
            $table->string('address');
            $table->string('district');
            $table->string('role');
            $table->string('mobileNumber'); 
            $table->string('subadminImage'); 
            $table->enum('status',['1','0'])->default('1');
            $table->string('createdBy'); 
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
        Schema::dropIfExists('sub_admins');
    }
};
