<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration {
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
            if ( ! Schema::hasColumn('listings', 'slug')) {
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
        // Update slugs in chunks for efficiency.
        DB::table('listings')
          ->orderBy('id')
          ->chunk(100, function ($listings) {
              $updates = [];

              foreach ($listings as $listing) {
                  // Using Str::random() for better efficiency.
                  $uniqueSuffix = Str::random(6);
                  $slug         = Str::slug($listing->business_name . '-' . $uniqueSuffix);
                  // Collect the updates for each listing.
                  $updates[] = [
                      'id'   => $listing->id,
                      'slug' => $slug,
                  ];
              }
              // Perform the bulk update using a single query to minimize DB hits.
              DB::table('listings')
                ->whereIn('id', array_column($updates, 'id'))
                ->update([
                    'slug' => DB::raw(
                        'CASE ' . implode(' ', array_map(function ($update) {
                            return "WHEN id = {$update['id']} THEN '{$update['slug']}'";
                        }, $updates)) . ' END'
                    )
                ]);
          });
    }
};
