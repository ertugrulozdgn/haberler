<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('editor_id');
            $table->integer('cover_id')->unsigned()->nullable();
            $table->integer('headline_id')->unsigned()->nullable();
            $table->tinyInteger('post_type')->unsigned()->nullable();
            $table->string('title');
            $table->string('short_title');
            $table->string('seo_title');
            $table->mediumText('summary');
            $table->string('slug');
            $table->tinyInteger('status')->unsigned();
            $table->string('redirect_link')->nullable();
            $table->tinyInteger('location')->unsigned();
            $table->bigInteger('hit')->unsigned()->default(0);
            $table->dateTime('published_at')->nullable();
            $table->tinyInteger('show_on_mainpage')->unsigned();
            $table->tinyInteger('commentable')->unsigned();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->text('content');
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
        Schema::dropIfExists('posts');
    }
}
