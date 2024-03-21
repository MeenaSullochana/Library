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
        Schema::create('magazines', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('language'); 
            $table->string('category'); 
            $table->string('periodicity');
            $table->string('single_issue_rate');
            $table->string('annual_subscription');
            $table->string('discount'); 
            $table->string('single_issue_after_discount'); 
            $table->string('annual_cost_after_discount');
            $table->string('rni_details');
            $table->string('total_pages'); 
            $table->string('total_multicolour_pages'); 
            $table->string('total_monocolour_pages'); 
            $table->string('paper_quality'); 
            $table->string('magazine_size'); 
            $table->string('contact_person'); 
            $table->string('phone'); 
            $table->string('email'); 
            $table->string('address'); 
            $table->string('front_img'); 
            $table->string('back_img'); 
            $table->string('full_img'); 
            $table->string('user_type'); 
            $table->string('user_id'); 
            $table->string('sample_pdf'); 
          
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
        Schema::dropIfExists('magazines');
    }
};