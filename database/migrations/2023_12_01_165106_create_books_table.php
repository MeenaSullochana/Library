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
        Schema::create('books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('book_title'); 
            $table->string('subtitle')->nullable(); 
            $table->json('series')->nullable();
            $table->json('volume')->nullable();
            $table->json('booktag')->nullable();
            $table->string('edition_number')->nullable(); 
            $table->json('primaryauthor'); 
            $table->json('trans_author')->nullable();
            $table->json('trans_from')->nullable();
            $table->string('type'); 
            $table->string('length'); 
            $table->string('breadth'); 
            $table->string('width'); 
            $table->string('weight'); 
            $table->string('gsm'); 
            $table->string('quality'); 
            $table->string('paper_finishing'); 
            $table->string('multicolor'); 
            $table->string('monocolor'); 
            $table->string('pages'); 
            $table->string('isbn'); 
            $table->string('subject'); 
            $table->string('place'); 
            $table->string('currency_type'); 
            $table->string('price'); 
            $table->string('category'); 
            $table->longtext('description'); 
            $table->longtext('notes')->nullable(); 
            $table->string('product_code'); 
            $table->string('others')->nullable(); 
            $table->string('front_img'); 
            $table->string('back_img'); 
            $table->string('full_img'); 
            $table->json('other_img')->nullable();
            $table->string('language'); 
            $table->string('other_indian')->nullable(); 
            $table->string('other_foreign')->nullable(); 
            $table->string('author_name'); 
            $table->string('author_img')->nullable(); 
            $table->json('banner_img'); 
            $table->string('product_img')->nullable(); 
            $table->longtext('author_description'); 
            $table->json('bookdescription'); 
            $table->string('user_type'); 
            $table->string('user_id'); 
            $table->string('length_breadth'); 
            $table->longtext('productdescription'); 
            $table->string('book_reviewer_id')->nullable(); 
            $table->string('book_procurement_status')->default(0); 
            $table->string('book_status')->nullable(); 
            $table->string('marks')->default(0); 
            $table->string('negotiation_status')->nullable(); 
            $table->string('negotiation_price')->nullable(); 
            $table->string('calculated_price')->nullable(); 
            $table->longtext('negotiation_message')->nullable(); 
            $table->string('final_price')->nullable(); 
            $table->longtext('negotiation_reject_message')->nullable(); 
            $table->longtext('reject_message')->nullable(); 
            $table->string('book_active_status')->default(1); 
            $table->string('sample_pdf')->nullable(); 
            $table->string('sample_epub')->nullable(); 
            $table->string('sample_file')->nullable(); 
            $table->string('nameOfPublisher'); 
            $table->longtext('return_message')->nullable(); 
            $table->string('yearOfPublication'); 
            $table->string('discountedprice'); 
            $table->string('discount'); 

            
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
        Schema::create('books', function (Blueprint $table) {
            $table->string('subtitle'); 
            $table->json('series');
            $table->string('edition_number'); 
            $table->string('others'); 
            $table->string('other_img'); 
            $table->string('notes'); 
            $table->string('product_img'); 
            $table->string('booktag'); 
            $table->json('trans_from');
            $table->string('author_img');
            $table->json('trans_author');
            $table->string('book_reviewer_id'); 
            $table->string('book_status'); 
            $table->string('other_indian'); 
            $table->string('other_foreign'); 
            $table->longtext('reject_message'); 
            $table->string('negotiation_status'); 
            $table->string('negotiation_price'); 
            $table->string('calculated_price'); 
            $table->longtext('negotiation_message'); 
            $table->string('final_price'); 
            $table->longtext('negotiation_reject_message'); 
            $table->string('book_active_status'); 
            $table->string('sample_pdf'); 
            $table->string('sample_epub'); 
            $table->string('sample_file'); 
            $table->longtext('return_message'); 
        });
    }
};