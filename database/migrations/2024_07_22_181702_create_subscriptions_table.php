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
        Schema::create('subscriptions', function (Blueprint $table) {

            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Reference to the users table
            $table->foreignId('listing_id')->unique()->constrained()->onDelete('cascade'); // Reference to the listings table
            $table->string('stripe_subscription_id')->unique()->nullable(); // Stripe subscription ID
            $table->string('stripe_customer_id')->nullable(); // Stripe customer ID
            $table->string('stripe_price_id')->nullable(); // Stripe price ID
            // Payment intent ID (stripe generates new payment intent for each recurring payment)
            $table->string('payment_intent_id')->nullable();

            $table->enum('status', ['refunded','pending', 'active', 'trialing', 'canceled', 'expired'])->default('pending'); // Subscription status
            $table->timestamp('start_date')->nullable(); // Subscription start date
            $table->timestamp('end_date')->nullable(); // Subscription end date or trial end date
            $table->timestamps(); // Created at and updated at timestamps

            // Ensure only one active subscription per listing
            /*$table->unique(['listing_id', 'status'], 'unique_active_subscription')
                  ->where('status', 'active');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
