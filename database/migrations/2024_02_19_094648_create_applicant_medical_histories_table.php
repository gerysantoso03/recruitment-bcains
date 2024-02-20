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
        Schema::create('applicant_medical_histories', function (Blueprint $table) {
            $table->id();
            $table->string('illness_name');
            $table->date('illness_date');
            $table->text('illness_impact');
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
        Schema::dropIfExists('applicant_medical_histories');
    }
};
