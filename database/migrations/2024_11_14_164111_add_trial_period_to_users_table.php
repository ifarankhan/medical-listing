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
        Schema::table('users', function (Blueprint $table) {
            // Check if 'trial_period_start' column does not exist, then add it
            if (!Schema::hasColumn('users', 'trial_period_start')) {
                $table->timestamp('trial_period_start')->nullable();
            }
            // Check if 'trial_period_end' column does not exist, then add it
            if (!Schema::hasColumn('users', 'trial_period_end')) {
                $table->timestamp('trial_period_end')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Check if 'trial_period_start' column exists, then drop it
            if (Schema::hasColumn('users', 'trial_period_start')) {
                $table->dropColumn('trial_period_start');
            }
            // Check if 'trial_period_end' column exists, then drop it
            if (Schema::hasColumn('users', 'trial_period_end')) {
                $table->dropColumn('trial_period_end');
            }
        });
    }
};
