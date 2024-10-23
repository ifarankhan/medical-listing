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
    public function up()
    {
        if (!Schema::hasColumn('messages', 'is_from_provider')) {
            Schema::table('messages', function (Blueprint $table) {
                $table->boolean('is_from_provider')->default(false)->after('user_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Check if the column exists before dropping it
        if (Schema::hasColumn('messages', 'is_from_provider')) {
            Schema::table('messages', function (Blueprint $table) {
                $table->dropColumn('is_from_provider');
            });
        }
    }
};
