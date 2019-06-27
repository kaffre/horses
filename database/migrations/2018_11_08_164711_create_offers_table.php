<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); 
            $table->integer('user_id')->unsigned(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');           
            $table->integer('category_id')->unsigned(); 
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); 
            $table->text('content');
            $table->text('position')->nullable(); 
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
        Schema::dropIfExists('offers');
    }
}
