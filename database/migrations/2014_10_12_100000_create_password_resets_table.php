<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    public function up()
    {  if(!Schema::hasTable('password_resets')) {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email');
            $table->rememberToken('token');
            $table->timestamp('created_at')->nullable();
        });
        Schema::table('password_resets', function (Blueprint $table){
            $table->index('email');
        });
    }
    }

    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
