<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->integer('value');
            $table->enum('discount_type', ['flat', 'percentage']);
            $table->boolean('free_shipping')->default(0);
            $table->boolean('status')->default(1);
            $table->integer('coupon_usage_limit');
            $table->integer('user_usage_limit');
            $table->integer('minimum_spend');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
