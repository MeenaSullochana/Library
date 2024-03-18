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
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('message');
            $table->string('from');
            $table->string('to');
            $table->string('type');
            $table->string('attachment')->nullable();
            $table->string('subject')->nullable();
            $table->string('announce_id')->nullable();
            $table->enum('status',['read','unread'])->default('unread');
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
        Schema::create('notifications', function (Blueprint $table) {
            $table->string('attachment'); 
            $table->json('subject');
            $table->string('announce_id'); 
    
        });
    }
};
