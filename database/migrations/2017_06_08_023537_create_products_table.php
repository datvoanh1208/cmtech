<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('product',function($table){
            $table->increments('id');
            $table->string('name');
            $table->integer('id_type');
            $table->text('description');
            $table->double('unit_price');
            $table->double('promotion_price');
            $table->string('image');
            $table->string('unit');
            $table->integer('new');
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
        //
        Schema::dropIfExists('product');

    }
}
