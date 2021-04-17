<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('daily_sells_id')->nullable();
            $table->unsignedInteger('product_id');
            $table->double('price');
            $table->double('quantity');
            $table->double('disscount');
            $table->double('total');
            $table->boolean('fullfilled')->default(false);
            $table->double('sales_tax')->default(0);
            $table->date('bill_date');
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
        Schema::dropIfExists('order_details');
    }
}
