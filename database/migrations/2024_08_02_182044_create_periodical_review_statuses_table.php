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
        Schema::create('periodical_review_statuses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('periodical_id')->references('id')->on("magazines")->onUpdate("cascade")->onDelete("cascade");
            $table->String('reviewer_id')->references('id')->on("reviewer")->onUpdate("cascade")->onDelete("cascade");
            $table->String('reviewertype');
            $table->String('remark')->nullable();
            $table->String('mark')->nullable();
            $table->json('review_remark')->nullable();
            $table->String('category')->nullable();
            $table->String('review_type')->nullable();
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
        Schema::create('periodical_review_statuses', function (Blueprint $table) {
            $table->string('remark');
            $table->String('mark');
            $table->String('review_type');
            $table->json('review_remark');
            $table->String('category');

            
        });    }
};
