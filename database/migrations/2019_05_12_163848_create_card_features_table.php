<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_features', function (Blueprint $table) {
            $table->increments('card_feature_id');
            $table->unsignedinteger('card_id');
            $table->unsignedinteger('start_point_booster');
            $table->unsignedinteger('last_point_booster');
            $table->unsignedinteger('super_category_id');
            $table->float('weight_this_week');
            $table->float('rank_this_week');
            $table->float('expected_customer_growth')->default(1);
            $table->float('expected_margin_cut')->default(1);
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
        Schema::dropIfExists('card_features');
    }
}
