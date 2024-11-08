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
        Schema::create('periodicalcopies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->String('periodicalid');
            $table->String('periodicaltitle');
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
        Schema::dropIfExists('periodicalcopies');
    }
};
