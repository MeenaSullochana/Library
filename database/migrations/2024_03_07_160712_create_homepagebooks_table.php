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
        Schema::create('homepagebooks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->String('type');
            $table->String('bookImage');
            $table->String('category');
            $table->String('booktitle');
            $table->String('subtitle')->nullable();
            $table->String('description'); 
            $table->enum('status',['1','0'])->default('1');

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
        Schema::create('homepagebooks', function (Blueprint $table) {
            $table->string('subtitle');
         
        });
    }
};
