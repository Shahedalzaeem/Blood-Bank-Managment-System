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
        Schema::create('bad_bloods', function (Blueprint $table) {
            $table->id();
            $table->string('component_type'); // RedBlood / Plasma / Platelet
            $table->string('blood_type');
            $table->string('rhesus_factor');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bad_bloods');
    }
};
