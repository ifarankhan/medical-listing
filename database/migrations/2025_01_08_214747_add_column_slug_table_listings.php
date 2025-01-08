<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // Check if the table 'listings' exists
        if (Schema::hasTable('listings')) {
            // Check if the column 'slug' already exists
            if (!Schema::hasColumn('listings', 'slug')) {
                Schema::table('listings', function (Blueprint $table) {
                    $table->string('slug', 100)
                          ->unique()
                          ->after('business_name')
                          ->default(''); // Adjust 'after' as needed
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        // Rollback: Remove 'slug' column if it exists
        if (Schema::hasTable('listings') && Schema::hasColumn('listings', 'slug')) {
            Schema::table('listings', function (Blueprint $table) {
                $table->dropColumn('slug');
            });
        }
    }
};
