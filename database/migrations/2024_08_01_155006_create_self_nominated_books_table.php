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
        Schema::create('self_nominated_books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('book_id'); 
            $table->string('created_by'); 
            $table->string('distributed_by');
            $table->string('creater_type');
            $table->string('distributor_type');
            $table->string('price'); 
            $table->string('percentage'); 
            $table->longText('quotation_reason');
            $table->longText('reject_reason')->nullable(); 
            $table->string('status'); 
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
        Schema::create('self_nominated_books', function (Blueprint $table) {
            $table->longText('quotation_reason')->nullable();;
            $table->longText('reject_reason')->nullable(); 
;
            
        });
    }
};
