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
        //        , ['unpaid', 'partial', 'paid']
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_id')->constrained('buildings')->onDelete('cascade');
            $table->foreignId('flat_id')->constrained('flats')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('bill_categories')->onDelete('cascade');
            $table->date('month');
            $table->decimal('amount', 12, 2);
            $table->string('status')->default('unpaid');
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();

            $table->index(['building_id']);
            $table->index(['flat_id']);
            $table->index(['category_id']);
            $table->index(['created_by']);
            $table->index(['status']);
            $table->index(['month']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
