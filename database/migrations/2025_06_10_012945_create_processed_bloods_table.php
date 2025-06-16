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
        Schema::create('processed_bloods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blood_unit_id');
            $table->integer('quantity');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('blood_unit_id')->references('id')->on('blood_units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processed_bloods');
    }
};
