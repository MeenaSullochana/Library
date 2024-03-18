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
        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('district');
            $table->text('subject');
            $table->text('description');
            $table->string('userId'); 
            $table->string('subAdminId');
            $table->string('ticketType');
            $table->enum('user',['1','0'])->default('1');
            $table->enum('subAdmin',['1','0'])->default('1');
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
        Schema::dropIfExists('tickets');
    }
};
