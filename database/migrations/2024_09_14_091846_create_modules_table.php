<?php

use App\Enums\ModuleStatus;
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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Module name (can be a reference..)
            $table->foreignId('module_type_id')->constrained()->onDelete('cascade');
            $table->integer('operation_duration')->default(0);
            $table->integer('data_sent_count')->default(0);
            $table->string('status')->default(ModuleStatus::ACTIVE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
