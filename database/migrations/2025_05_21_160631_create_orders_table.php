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
        $table->foreignId('member_id')->constrained()->onDelete('cascade');
        $table->dateTime('order_date');
        $table->enum('status', ['Pending', 'Shipped', 'Completed', 'Cancelled']);
        $table->decimal('shipping_cost', 10, 2)->default(0);
        $table->decimal('vat', 10, 2)->default(0);
        $table->decimal('discount', 10, 2)->default(0);
        $table->decimal('total', 12, 2);
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
