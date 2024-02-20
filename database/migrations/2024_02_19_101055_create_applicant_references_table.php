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
        Schema::create('applicant_references', function (Blueprint $table) {
            $table->id();
            $table->string('reference_name');
            $table->string('reference_relation');
            $table->text('reference_address');
            $table->integer('phone_number');
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
        Schema::dropIfExists('applicant_references');
    }
};
