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
        if (Schema::hasTable('listings')) {
            // Check if the zipcode column does not exist
            if (!Schema::hasColumn('listings', 'zipcode')) {
                Schema::table('listings', function (Blueprint $table) {
                    // Adding the zipcode column
                    $table->string('business_zipcode')->nullable()
                        ->after('business_address'); // Change to `->notNullable()` if required
                });
            }
            // Check if the city column does not exist
            if (!Schema::hasColumn('listings', 'city')) {
                Schema::table('listings', function (Blueprint $table) {
                    // Adding the city column
                    $table->string('business_city')->nullable()
                        ->after('business_address'); // Change to `->notNullable()` if required
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Check if the table exists
        if (Schema::hasTable('listings')) {
            // Check if the zipcode column exists
            if (Schema::hasColumn('listings', 'zipcode')) {
                Schema::table('listings', function (Blueprint $table) {
                    // Dropping the zipcode column
                    $table->dropColumn('zipcode');
                });
            }

            // Check if the city column exists
            if (Schema::hasColumn('listings', 'city')) {
                Schema::table('listings', function (Blueprint $table) {
                    // Dropping the city column
                    $table->dropColumn('city');
                });
            }
        }
    }
};
