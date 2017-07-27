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
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
           
            $table->increments('id');
            $table->string('full_name');
            $table->string('handle')->unique();
            $table->string('facebook_id')->unique();
            $table->string('google_id');
            $table->string('twitter_id');
            $table->string('github_id');
            $table->string('email')->unique();
            $table->string('avatar');
            $table->string('level');
            $table->string('password');
            $table->string('phone');
            $table->string('address');
            $table->rememberToken();
            $table->timestamps();
            

            
            // $table->string('facebook_id')->unique();
            // $table->string('avatar');
           
            
            
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
