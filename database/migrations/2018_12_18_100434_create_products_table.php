<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('my_shop_id');
            $table->unsignedinteger('shared_times')->default(0);
            $table->string('product_name');
            $table->mediumText('description');
            $table->boolean('is_card_active')->default(0);
            $table->boolean('is_available')->default(1);
            $table->double('popularity');
            $table->bigInteger('cost_price');
            $table->bigInteger('s_i_unit_id');
            $table->float('regular_price');
            $table->float('discount_price')->default(0);
            $table->unsignedinteger('product_category_id')->default(1);
            $table->boolean('texable')->default(1);
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
        Schema::dropIfExists('products');
    }
}
