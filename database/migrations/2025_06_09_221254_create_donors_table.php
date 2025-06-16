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
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('donor_name');
            $table->string('mother_name');
            $table->string('father_name');
            $table->enum('gender', ['male', 'female']);
            $table->string('donor_identifier')->unique();
            $table->string('address');
            $table->date('birth_date');
            $table->string('phone');
            $table->string('email');
            $table->date('record_date');
            $table->boolean('smoking')->default(false);
            $table->boolean('alcohol')->default(false);
            $table->boolean('tattoo')->default(false);
            $table->text('medical_history')->nullable();
            $table->text('treatment_history')->nullable();
            $table->text('surgical_history')->nullable();
            $table->text('allergy_info')->nullable();
            $table->softDeletes(); // للحذف المؤقت
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
