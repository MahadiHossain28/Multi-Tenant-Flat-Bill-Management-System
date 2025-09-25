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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact')->unique()->nullable();
            $table->foreignId('assigned_house_owner_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('assigned_building_id')->nullable()->constrained('buildings')->onDelete('set null');
            $table->foreignId('assigned_flat_id')->nullable()->constrained('flats')->onDelete('set null');
            $table->timestamps();

            $table->index('assigned_house_owner_id');
            $table->index('assigned_building_id');
            $table->index('assigned_flat_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
