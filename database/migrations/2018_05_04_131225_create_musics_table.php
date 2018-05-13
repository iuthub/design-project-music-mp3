<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('musics')) {
            Schema::create('music', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('album');
                $table->text('img_path');
                $table->string('file_path');
                $table->string('title');
                $table->string('artist');
                $table->string('genre');
                $table->integer('liked_num');
                $table->integer('played_num');
                $table->boolean('set-global');
                $table->timestamp('created_at')->nullable();
            });

        }

    }


    public function down()
    {
        Schema::dropIfExists('musics');
    }
}
