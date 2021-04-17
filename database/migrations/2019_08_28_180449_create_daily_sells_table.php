<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailySellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_sells', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('my_shop_id');
            $table->unsignedInteger('payment_id')->default(0);
            $table->date('order_date');
            $table->double('salesTax')->default(0);
            $table->text('error_msg');
            $table->text('reference_code');
            $table->string('order_id');
            $table->string('razorpay_signature');
            $table->string('razorpay_payment_id');
            $table->unsignedInteger('extra_off');
            $table->unsignedInteger('order_status_id');
            $table->unsignedInteger('store_credit');
            $table->unsignedInteger('cod_points');
            $table->boolean('fullfilled')->default(0);
            $table->boolean('deleted')->default(0);
            $table->double('payble')->default(0);
            $table->double('paid')->default(0);
            $table->date('payment_date');
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
        Schema::dropIfExists('daily_sells');
    }
}
