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
        Schema::create('applicant_skills', function (Blueprint $table) {
            $table->id();
            $table->text('languages');
            $table->text('computers');
            $table->text('organizations');
            $table->text('latest_jobdesc')->nullable();
            $table->text('organization_structure')->nullable();
            $table->unsignedBigInteger('applicant_id');
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_skills');
    }
};
