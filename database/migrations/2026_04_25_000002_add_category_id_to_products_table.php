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
        Schema::table('products', function (Blueprint $table) {
            // Option 2 from the image: Add category_id
            $table->foreignId('category_id')->nullable()->after('user_id')->constrained('categories')->cascadeOnDelete();
            
            // Rename qty to quantity as per the schema in the image
            $table->renameColumn('qty', 'quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropConstrainedForeignId('category_id');
            $table->renameColumn('quantity', 'qty');
        });
    }
};
