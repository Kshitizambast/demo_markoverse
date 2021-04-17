<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investment_billings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('investment_id');
            $table->float('invested_money');
            $table->float('total_earned_money');
            $table->float('markoverse_cut');
            $table->float('final_profit');
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
        Schema::dropIfExists('investment_billings');
    }
}
