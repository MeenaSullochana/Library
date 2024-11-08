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
        Schema::create('libeaey_budgets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->String('libraryType');
            $table->String('subject');
            $table->String('description');
            $table->String('totalAmount');
            $table->String('type');
            $table->longtext('purchaseid');
            $table->json('CategorieAmount');
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
        Schema::dropIfExists('libeaey_budgets');
    }
};
