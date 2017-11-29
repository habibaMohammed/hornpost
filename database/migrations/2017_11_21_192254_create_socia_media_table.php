<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSociaMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socialMedia', function (Blueprint $table) {
            $table->increments('id');
             $table -> integer('user_id') -> unsigned() -> default(0);
      $table->foreign('user_id')
          ->references('id')->on('users')
          ->onDelete('cascade');
            $table->string('facebook');
         
            $table->string('twitter');
            $table->string('linkedin');
    
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
        Schema::drop('socialMedia');
    }
}
