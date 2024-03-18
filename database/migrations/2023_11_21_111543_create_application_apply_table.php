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
        Schema::create('application_apply', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('event_id');
            $table->string('apply_id');
            $table->string('totalStall');
            $table->string('applicationNumber');
            $table->string('allocatedStall');
            $table->enum('status',['pending','approve','reject'])->default('pending');
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
        Schema::dropIfExists('application_apply');
    }
};
