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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_name');
            $table->string('job_role');
            $table->string('job_qualification');
            $table->string('job_activities');
            $table->date('valid_start')->default(DB::raw('current_date'));
            $table->date('valid_end');
            $table->string('location');
            $table->string('working_type');
            $table->foreignId('department_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
