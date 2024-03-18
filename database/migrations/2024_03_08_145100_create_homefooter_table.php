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
        Schema::create('homefooter', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->longtext('about');
            $table->longtext('address');
            $table->String('phoneNumber');
            $table->String('faxNumber');
          
            $table->String('email');
            $table->String('facebook')->nullable();
            $table->String('twitter')->nullable(); 
            $table->String('youtube')->nullable();
            $table->String('copyright'); 
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
        Schema::create('homefooter', function (Blueprint $table) {
            $table->string('facebook');
            $table->string('linkedin');
            $table->string('twitter');
        });
    }
};
