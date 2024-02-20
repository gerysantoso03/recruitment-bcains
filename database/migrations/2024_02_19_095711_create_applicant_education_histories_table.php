<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicant_education_histories', function (Blueprint $table) {
            $table->id();
            $table->string('education');
            $table->string('education_category');
            $table->string('institution');
            $table->text('institution_address');
            $table->string('major');
            $table->integer('start_year');
            $table->integer('end_year');
            $table->text('remarks');
            $table->foreignId('applicant_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_education_histories');
    }
};
