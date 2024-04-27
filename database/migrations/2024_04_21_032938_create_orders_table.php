<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $payment_status = \App\Models\Order::PAYMENT_STATUS;
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('order_number');
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('whatsapp')->nullable();
            $table->string('payment')->nullable();
            $table->string('payment_token')->nullable();
            $table->string('payment_link')->nullable();
            $table->enum('payment_status', $payment_status)->default($payment_status[0]);
            $table->string('currency')->default('IDR');
            $table->float('amount')->default(0);
            $table->integer('status_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
