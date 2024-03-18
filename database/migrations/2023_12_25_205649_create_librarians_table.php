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
        Schema::create('librarians', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('libraryType'); 
            $table->string('libraryName'); 
            $table->string('state'); 
            $table->string('district'); 
            $table->string('city'); 
            $table->string('Village');
            $table->string('librarianName');    
            $table->string('librarianDesignation'); 
            $table->string('phoneNumber'); 
            $table->string('email');
            $table->string('password'); 
            $table->string('metaChecker'); 
            $table->string('role');
            $table->string('librarianId');
            $table->json('subject');
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
        Schema::dropIfExists('librarians');
    }
};
