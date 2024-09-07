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
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('stripe_price_id'); // Stripe price ID for the subscription.
            $table->string('status'); // Subscription status (active, canceled, etc.).
            $table->timestamp('started_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn('stripe_price_id');
            $table->dropColumn('status');
            $table->dropColumn('started_at');
            $table->dropColumn('canceled_at');
        });
    }
};
