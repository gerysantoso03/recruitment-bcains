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
            $table->integer('age');
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
            $table->string('application_status')->default('New Applied');
            $table->date('application_date')->default(DB::raw('current_date'));
            $table->string('info_of_job');
            $table->text('social_medias');
            $table->string('applicant_photo');
            $table->boolean('term_and_co')->default(false);
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('application_status_id')->default(1)->constrained();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('application_status_id')->references('id')->on('application_statuses');
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
