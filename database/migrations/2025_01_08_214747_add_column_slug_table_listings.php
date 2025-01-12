<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

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
                          ->after('business_name')
                          ->nullable(); // Adjust 'after' as needed
                });

                // For existing records.
                $this->backfillExistingDataWithBusinessNameAndIdAsSlug();

                // Now add unique.
                Schema::table('listings', function (Blueprint $table) {
                    $table->string('slug', 100)
                          ->unique()
                          ->nullable(false)
                          ->change();
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

    protected function backfillExistingDataWithBusinessNameAndIdAsSlug(): void
    {
        DB::table('listings')->get()->each(function ($listing) {

            $uniqueSuffix = substr(md5(uniqid($listing->business_name, true)), 0, 6);
            $slug = Str::slug($listing->business_name . '-' . $uniqueSuffix);
            DB::table('listings')
              ->where('id', $listing->id)
              ->update(['slug' => $slug]);
        });
    }
};
