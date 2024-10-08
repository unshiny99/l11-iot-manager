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
        Schema::create('module_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // e.g. Temperature Sensor, Speed Sensor
            $table->string('brand')->nullable(); 
            $table->string('model')->nullable(); 
            $table->string('unit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_types');
    }
};
