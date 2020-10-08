<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrawlerPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawler_posts', function (Blueprint $table) {
            $table->id();
            $table->string("site");
            $table->string("link");
            $table->string("original_id");
            $table->tinyInteger('status')->unsigned();
            $table->string("image");
            $table->string("title");
            $table->string("summary");
            $table->string("content");
            $table->dateTime("published_at");
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
        Schema::dropIfExists('crawler_posts');
    }
}
