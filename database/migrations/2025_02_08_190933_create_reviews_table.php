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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id'); // No foreign key constraint
            $table->unsignedBigInteger('customer_id'); // No foreign key constraint
            $table->tinyInteger('rating')->unsigned(); // Rating (1-5)
            $table->text('review_text'); // Review Content
            $table->timestamps();
            // Ensure a customer can only review a listing once.
            $table->unique(['listing_id', 'customer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
