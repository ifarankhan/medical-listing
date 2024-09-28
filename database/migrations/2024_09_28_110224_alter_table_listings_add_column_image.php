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
        // Check if the 'users' table exists
        if (Schema::hasTable('listings')) {
            // Check if the 'profile_picture' column doesn't exist
            if (!Schema::hasColumn('listings', 'profile_picture')) {
                Schema::table('listings', function (Blueprint $table) {
                    $table->string('profile_picture')->nullable();
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
        if (Schema::hasTable('listings')) {
            // Check if the 'profile_picture' column doesn't exist
            if (!Schema::hasColumn('listings', 'profile_picture')) {
                Schema::table('listings', function (Blueprint $table) {
                    $table->dropColumn('profile_picture');
                });
            }
        }
    }
};
