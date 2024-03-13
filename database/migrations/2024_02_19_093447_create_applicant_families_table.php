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
        Schema::create('applicant_families', function (Blueprint $table) {
            $table->id();
            $table->string('family_name');
            $table->string('gender');
            $table->integer('age');
            $table->string('last_education');
            $table->string('occupation');
            $table->string('employeer_name');
            $table->string('relation');
            $table->unsignedBigInteger('applicant_id');
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_families');
    }
};
