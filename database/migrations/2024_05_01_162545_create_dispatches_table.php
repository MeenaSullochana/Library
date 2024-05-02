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
        Schema::create('dispatches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('magazine_id');
            $table->string('subscription_id');
            $table->string('expected_date');
            $table->json('order_id');
            $table->json('library_id');
            $table->json('received_id');
            $table->json('pending_id');
            $table->json('not_received_id');
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
        Schema::dropIfExists('dispatches');
    }
};
