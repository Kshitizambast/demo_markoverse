<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card_title');
            $table->unsignedinteger('super_category_id');
            $table->string('code');
            $table->text('description');
            $table->unsignedinteger('card_type_id');
            $table->unsignedinteger('discount')->default(null);
            $table->unsignedinteger('cashback')->default(null);
            $table->float('price');
            //$table->unsignedinteger('frequency');
            //$table->unsignedinteger('days_left_to_active')->default(9);
            $table->unsignedinteger('min_range');
            $table->unsignedinteger('max_range');
            $table->unsignedinteger('point_schema_id');
            $table->unsignedinteger('min_point');
            $table->unsignedinteger('min_spending');
            $table->unsignedinteger('tag_id');
            $table->boolean('open_for_voting')->default(true);
            $table->boolean('activated')->default(false);
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
        Schema::dropIfExists('cards');
    }
}
