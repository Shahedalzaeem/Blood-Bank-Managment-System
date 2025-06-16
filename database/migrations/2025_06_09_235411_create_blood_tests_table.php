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
        Schema::create('blood_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donation_id');
            $table->date('test_date');
            $table->string('hiv_test')->default('Negative');
            $table->string('hepatitis_test')->default('Negative');
            $table->string('syphilis_test')->default('Negative');
            $table->string('htlv_test')->default('Negative');
            $table->string('malaria_test')->default('Negative');
            $table->timestamps();

            $table->foreign('donation_id')->references('id')->on('donations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_tests');
    }
};
