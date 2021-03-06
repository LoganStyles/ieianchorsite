<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //create db first
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('role');
            $table->string('signature_created')->nullable();
//            $table->enum('access',['basic','admin','super']);
            $table->string('email')->unique();
            $table->string('password');
            $table->ipAddress('last_login_ip')->nullable();
            $table->macAddress('mac')->nullable();
            $table->dateTime('last_login_time')->nullable();
            $table->dateTime('last_logout_time')->nullable();
            $table->string('type')->default('user');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
