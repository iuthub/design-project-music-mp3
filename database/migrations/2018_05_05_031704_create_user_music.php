<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMusic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_user', function (Blueprint $table){
            $table->increments('id');

            $table->integer('user_id')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('music_id')->unsigned()->default(1);
            $table->foreign('music_id')->references('id')->on('music');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
