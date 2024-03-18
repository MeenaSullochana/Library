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
        Schema::create('procurement_paymrnts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->json('bookId');
            $table->String('userId');
            $table->String('amount');
            $table->String('totalAmount');
            $table->String('userType');
            $table->String('userName');
            $table->String('paymentType');
            $table->String('invoiceNumber');
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
        Schema::dropIfExists('procurement_paymrnts');
    }
};
