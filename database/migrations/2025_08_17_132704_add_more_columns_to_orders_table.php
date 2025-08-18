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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('order_number')->unique()->after('id');
            $table->string('currency')->default('USD')->after('total_price');
            $table->string('payment_method')->nullable()->after('currency');
            $table->text('shipping_address')->nullable()->after('payment_method');
            $table->text('billing_address')->nullable()->after('shipping_address');
            $table->decimal('shipping_cost', 8, 2)->default(0.00)->after('billing_address');
            $table->decimal('tax_amount', 8, 2)->default(0.00)->after('shipping_cost');
            $table->decimal('discount_amount', 8, 2)->default(0.00)->after('tax_amount');
            $table->text('notes')->nullable()->after('discount_amount');
            $table->timestamp('shipped_at')->nullable()->after('notes');
            $table->timestamp('delivered_at')->nullable()->after('shipped_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'order_number',
                'currency',
                'payment_method',
                'shipping_address',
                'billing_address',
                'shipping_cost',
                'tax_amount',
                'discount_amount',
                'notes',
                'shipped_at',
                'delivered_at',
            ]);
        });
    }
};
