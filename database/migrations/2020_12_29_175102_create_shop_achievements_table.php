<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_achievements', function (Blueprint $table) {
            $table->id();
            $table->text('achievement_names');
            $table->unsignedInteger('super_category_id');
            $table->text('badge_type');
            $table->boolean('based_on_customer_growth');
            $table->boolean('based_on_revenue_growth');
            $table->integer('customer_growth');
            $table->integer('revenue_growth');
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
        Schema::dropIfExists('shop_achievements');
    }
}
