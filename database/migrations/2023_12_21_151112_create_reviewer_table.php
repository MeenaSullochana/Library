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
        Schema::create('reviewer', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('reviewerType'); 
            $table->string('name'); 
            $table->string('subject')->nullable(); 
            $table->string('designation')->nullable(); 
            $table->string('organisationDetails')->nullable(); 
            $table->string('phoneNumber');
            $table->string('profileImage')->nullable();    
            $table->string('bankName')->nullable(); 
            $table->string('accountNumber')->nullable(); 
            $table->string('branch')->nullable(); 
            $table->string('ifscNumber')->nullable(); 
            $table->string('district')->nullable(); 
            $table->string('membershipId')->nullable(); 
            $table->string('libraryType')->nullable(); 
            $table->string('libraryName')->nullable(); 
            $table->string('Category')->nullable(); 
            $table->string('email');
            $table->string('password'); 
            $table->string('role');
            $table->string('reviewerId');
            $table->string('creater');
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
        Schema::dropIfExists('reviewer');  Schema::create('publisher_distributors', function (Blueprint $table) {
            $table->string('subject'); 
            $table->string('designation'); 
            $table->string('organisationDetails'); 
            $table->string('profileImage');    
            $table->string('bankName'); 
            $table->string('accountNumber'); 
            $table->string('branch'); 
            $table->string('ifscNumber'); 
            $table->string('district'); 
            $table->string('membershipId'); 
            $table->string('libraryType'); 
            $table->string('libraryName'); 
            $table->string('Category'); 
            
        });
    }
};
