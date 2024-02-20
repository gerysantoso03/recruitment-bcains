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
            $table->string('position_name');
            $table->string('position_status')->default('Available');
            $table->string('employment_type');
            $table->longText('qualifications');
            $table->date('post_date')->default(DB::raw('current_date'));
            $table->date('end_date');
            $table->foreignId('branch_id');
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
