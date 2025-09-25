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
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('house_owner_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('building_id')->constrained('buildings')->onDelete('cascade');
            $table->string('number');
            $table->string('owner_name')->nullable();
            $table->string('owner_email')->unique()->nullable();
            $table->string('owner_contact')->unique()->nullable();
            $table->timestamps();

            $table->unique(['building_id', 'number']);
            $table->index('house_owner_id','building_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flats');
    }
};
