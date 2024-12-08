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
        Schema::table('product_services', function (Blueprint $table) {

            if (!Schema::hasColumn('product_services', 'accepting_clients')) {

                $table->tinyInteger('accepting_clients')->after('price')->nullable();
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
        Schema::table('product_services', function (Blueprint $table) {

            if (Schema::hasColumn('product_services', 'accepting_clients')) {

                $table->removeColumn('accepting_clients');
            }
        });
    }
};
