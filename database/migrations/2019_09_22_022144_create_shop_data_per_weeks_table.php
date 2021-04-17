<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopDataPerWeeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_data_per_weeks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('my_shop_id');
            $table->unsignedInteger('order_cards_id')->default(0);
            $table->unsignedInteger('payment_id')->default(0);
            $table->unsignedInteger('total_template_shared');
            $table->float('can_invest_indivisually');
            $table->float('total_stock_price');
            $table->string('recovery_code');
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
        Schema::dropIfExists('shop_data_per_weeks');
    }
}
