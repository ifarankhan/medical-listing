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
        Schema::create('product_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id');
            $table->foreign('listing_id')
                  ->references('id')
                  ->on('listings')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('category_id'); // Add category_id column
            $table->foreign('category_id') // Define foreign key constraint
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
            $table->text('description');
            $table->boolean('virtual')->default(false);
            $table->boolean('in_person')->default(false);
            $table->boolean('accept_insurance')->default(false);
            $table->string('insurance_list')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('product_services');
    }
};
