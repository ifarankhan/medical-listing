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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            // Eligibility Section
            $table->boolean('authorized')
                  ->comment('Are you legally authorized to promote products and services?');
            $table->boolean('registered')->comment('Is the business a legally registered entity?');

            // User Information Section
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email'); // A listing can have the same user info.
            $table->string('contact_number');
            $table->string('address');

            // Business Information Section
            $table->string('business_name')->comment('Legal Business Name');
            $table->string('ein')->comment('Employer Identification Number');
            $table->text('business_address');
            $table->string('business_contact');
            $table->string('business_email');

            // Timestamps
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
        Schema::dropIfExists('listings');
    }
};
