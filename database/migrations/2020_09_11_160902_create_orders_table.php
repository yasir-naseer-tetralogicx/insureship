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
            $table->bigInteger('id');
            $table->longText('fulfillments')->nullable();
            $table->string('financial_status')->nullable();
 	    $table->string('total')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('order_name')->nullable();
            $table->longText('shipping_address')->nullable();
	    $table->string('frugo_id')->nullable();
	    $table->longText('line_items')->nullable();
	    $table->longText('customer')->nullable();
	    $table->longText('shipping_price')->nullable();
	    $table->string('order_date')->nullable();
	    $table->string('fulfillment_status')->nullable();
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
