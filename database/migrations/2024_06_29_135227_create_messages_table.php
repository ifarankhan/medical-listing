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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 200);
            $table->string('email', 200);
            $table->string('phone', 50);
            $table->string('subject', 200);
            $table->text('body');
            $table->unsignedBigInteger('listing_id');
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['unread', 'read'])->default('unread');
            $table->timestamp('created_at')->useCurrent(); // Use CURRENT_TIMESTAMP as default
            $table->timestamp('updated_at')->useCurrent(); // Use CURRENT_TIMESTAMP as default

            // Foreign key constraints
            $table->foreign('listing_id')
                  ->references('id')
                  ->on('listings')
                  ->onDelete('cascade');
            $table->foreign('provider_id')
                  ->references('id')->on('users')
                                    ->onDelete('cascade');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
