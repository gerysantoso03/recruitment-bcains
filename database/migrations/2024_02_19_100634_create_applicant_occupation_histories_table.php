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
        Schema::create('applicant_occupation_histories', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->text('company_address');
            $table->integer('company_phone');
            $table->string('latest_position');
            $table->integer('salary');
            $table->string('direct_spv');
            $table->integer('start_year');
            $table->integer('end_year');
            $table->text('reason_of_leaving');
            $table->text('latest_jobdesc');
            $table->text('organization_structure');
            $table->unsignedBigInteger('applicant_id');
            $table->foreign('applicant_id')->on('id')->references('applicants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_occupation_histories');
    }
};
