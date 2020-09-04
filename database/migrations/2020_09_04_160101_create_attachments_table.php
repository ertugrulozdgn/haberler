<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->unsigned();  //cover_im/headline_img
            $table->string('mime_type');  // uzantı->jpg,png vs
            $table->mediumText('file_name'); //post_title + cover_im/headline_img + rnd(4) + mime_type
            $table->mediumText('storage_path'); // /file/images/YYYY/MM/DD/file_name şeklinde olacak klasör yolu
            $table->mediumText('public_path'); // /storage/ + storage_path
            $table->integer('size')->unsigned();
            $table->tinyInteger('width')->unsigned();
            $table->tinyInteger('height')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
}
