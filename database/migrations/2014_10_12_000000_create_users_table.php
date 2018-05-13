<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsersTable extends Migration
{

    public function up()
    {
        if(!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->rememberToken();
                $table->string('img_path');
                $table->timestamps();
            });


        }
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
}
