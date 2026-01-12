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
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('reference')->unique(); // Ex: CMD-2026-001
        $table->decimal('total_amount', 15, 2);
        $table->string('status')->default('en_attente'); // en_attente, payé, livré, annulé
        $table->string('payment_method')->nullable(); // Mobile Money, Cash, etc.
        $table->text('shipping_address')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
