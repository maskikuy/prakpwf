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
        Schema::table('categories', function (Blueprint $table) {
            // Check if column exists before dropping to avoid errors
            if (Schema::hasColumn('categories', 'product_id')) {
                $table->dropConstrainedForeignId('product_id');
            }
            
            // Add unique constraint to name if not already there
            $table->string('name')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropUnique(['name']);
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('cascade');
        });
    }
};
