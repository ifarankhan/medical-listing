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
        if (!Schema::hasTable('states')) {

            Schema::create('states', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique(); // Full name of the state.
                $table->string('abbreviation', 2)->unique(); // State abbreviation (e.g., AL).
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
