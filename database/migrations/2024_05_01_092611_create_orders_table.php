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
            $table->foreignIdFor(App\Models\User::class);
            $table->string('billing_email');
            $table->string('billing_name');
            $table->string('billing_address');
            $table->string('billing_city');
            $table->string('billing_province');
            $table->string('billing_postalcode');
            $table->string('billing_phone');
            $table->string('billing_name_on_card');
            $table->integer('billing_discount')->default(0);
            $table->string('billing_discount_code')->nullable();
            $table->integer('billing_subtotal');
            $table->integer('billing_tax');
            $table->integer('billing_total');
            $table->string('payment_gateway')->default('stripe');
            $table->boolean('shipped')->default(false);
            $table->string('error')->nullable();
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
