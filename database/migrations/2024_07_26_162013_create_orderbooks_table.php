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
        Schema::create('orderbooks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->String('librarianid');
            $table->String('budgetid');
            $table->json('balanceAmount');  
            $table->json('bookProduct');
            $table->String('libraryType');
            $table->String('totalBudget');
            $table->String('totalPurchased');
            $table->String('totalBal');
            $table->String('orderid');
            $table->String('quantity');
            $table->String('libraryid');
            $table->String('readersForum');

            
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
        Schema::dropIfExists('orderbooks');
    }
};
