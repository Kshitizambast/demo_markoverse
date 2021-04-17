<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogSections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->unsignedinteger('user_id');
            $table->unsignedinteger('category_id')->default(1);
             $table->string('title');
             $table->longText('blogs');
             $table->string('thumbnail_url');
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
        Schema::dropIfExists('blog_sections');
    }
}
