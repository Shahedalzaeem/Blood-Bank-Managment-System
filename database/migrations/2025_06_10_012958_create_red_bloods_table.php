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
        Schema::create('red_bloods', function (Blueprint $table) {
            $table->id();
            $table->string('blood_type');
            $table->string('rhesus_factor');
            $table->integer('quantity');
            $table->date('original_date'); // من تاريخ كيس الدم الأساسي
            $table->timestamp('expiration_timer'); // يتم تعبئته عند المعالجة (42 يوم)
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('red_bloods');
    }
};
