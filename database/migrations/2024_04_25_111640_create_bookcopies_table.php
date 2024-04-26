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
        Schema::create('bookcopies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->String('bookid');
            $table->String('booktitle');
            $table->String('userid');
            $table->String('usertype');
            $table->json('copies');
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
        Schema::dropIfExists('bookcopies');
    }
};
