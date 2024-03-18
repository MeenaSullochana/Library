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
        Schema::create('ticket_chats', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('from');
            $table->string('to');
            $table->string('message');
            $table->enum('readStatus',['1','0'])->default('1');
            $table->enum('status',['1','0'])->default('1');
            $table->foreignUuid('ticket_Id')->references('id')->on("tickets")->onUpdate("cascade")->onDelete("cascade");
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
        Schema::dropIfExists('ticket_chats');
    }
};
