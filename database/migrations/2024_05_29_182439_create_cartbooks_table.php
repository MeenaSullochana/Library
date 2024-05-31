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
        Schema::create('cartbooks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->String('title');
            $table->String('image');
            $table->String('librarianid');
            $table->String('bookid');
            $table->String('budgetid');
            $table->String('amount');  
            $table->String('quantity');
            $table->String('totalAmount');
            $table->string('category'); 
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
        Schema::dropIfExists('cartbooks');
    }
};
