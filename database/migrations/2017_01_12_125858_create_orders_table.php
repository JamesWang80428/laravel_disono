<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->integer('customer_id')->default(0);

            $table->string('ip_address', 100);
            $table->string('email', 100)->nullable();
            $table->string('phone', 22)->nullable();

            $table->text('billing_address');
            $table->text('shipping_address');

            $table->double('discount', 9, 2)->default(0);
            $table->double('shipping', 9, 2)->default(0);
            $table->double('tax', 9, 2)->default(0);
            $table->double('total', 9, 2)->default(0);

            $table->integer('payment_type');
            $table->enum('status', order_status());
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