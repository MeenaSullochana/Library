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
            $table->string('rni_details');
            $table->string('rniproof');
            $table->string('language'); 
            $table->string('category'); 
            $table->string('title'); 
            $table->string('periodicity');
            $table->string('single_issue_rate');
            $table->string('annual_subscription');
            $table->string('discount'); 
            $table->string('single_issue_after_discount'); 
            $table->string('annual_cost_after_discount');
            $table->string('total_pages'); 
            $table->string('total_multicolour_pages'); 
            $table->string('total_monocolour_pages'); 
            $table->string('paper_quality')->nullable(); 
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
            $table->string('bank_Name'); 
            $table->string('ifsc_Code'); 
            $table->string('ban_Acc_Num'); 
            $table->string('acc_Hol_Nam'); 
            $table->string('sample_pdf')->nullable(); 
            $table->string('publisher_name')->nullable(); 
            $table->string('editor_name')->nullable(); 
            $table->string('first_issue_year')->nullable(); 
            $table->string('issue_per_year')->nullable(); 
            $table->string('every_issue_date')->nullable(); 
            $table->string('gsm')->nullable(); 
            $table->string('papertype')->nullable(); 
            $table->string('paperfinishing')->nullable();
            $table->string('highlights')->nullable();
            $table->string('periodical_short_info')->nullable();
            $table->string('about_editor')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('pincode')->nullable();
            $table->string('official_address')->nullable();
            $table->string('pdf1')->nullable();
            $table->string('pdf2')->nullable();
            $table->string('pdf3')->nullable();
            $table->string('editorprofile')->nullable();
            $table->string('highlightimg')->nullable();
            $table->enum('status',['1','0'])->default('0');
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
        Schema::create('magazines', function (Blueprint $table) {
            $table->string('paper_quality'); 
            $table->string('sample_pdf'); 
            $table->string('publisher_name'); 
            $table->string('editor_name'); 
            $table->string('first_issue_year'); 
            $table->string('issue_per_year'); 
            $table->string('every_issue_date'); 
            $table->string('gsm'); 
            $table->string('papertype'); 
            $table->string('paperfinishing');
            $table->string('highlights');
            $table->string('periodical_short_info');
            $table->string('about_editor');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('district');
            $table->string('pincode');
            $table->string('official_address');
            $table->string('pdf1');
            $table->string('pdf2');
            $table->string('pdf3');
            $table->string('editorprofile');
            $table->string('highlightimg');
        });
    }
};
