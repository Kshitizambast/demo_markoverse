<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedinteger('category_id')->default(1);
            $table->string('shop_name');
            $table->string('shop_phone', 10)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('open_for_investment')->default(1);
            $table->boolean('can_buy_cards')->default(true);
            $table->string('address');
            $table->text('specialist_in');
            $table->double('popularity');
            $table->boolean('is_open_now')->default(1);
            $table->boolean('home_delivery_available')->default(0);
            $table->unsignedinteger('maximum_investor_count');
            $table->unsignedinteger('zip_or_pin');
            $table->unsignedinteger('geocode_id')->nullable();
            $table->unsignedinteger('owner_id');
            $table->unsignedinteger('city_id')->nullable();
            $table->time('opening_time');
            $table->time('closing_time');
            $table->string('close_on');
            $table->rememberToken();
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
        Schema::dropIfExists('my_shops');
    }
}
