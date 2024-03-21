<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->date('birth_date');
            $table->string('birth_place');
            $table->text('address');
            $table->text('applicant_phones');
            $table->string('religion');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('ktp_number')->unique();
            $table->string('hobby');
            $table->string('blood_type');
            $table->integer('height');
            $table->integer('weight');
            $table->string('application_status')->default('SENT');
            $table->date('application_date')->default(DB::raw('current_date'));
            $table->string('info_of_job');
            $table->text('social_medias');
            $table->string('applicant_photo');
            $table->boolean('term_and_co')->default(false);
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
