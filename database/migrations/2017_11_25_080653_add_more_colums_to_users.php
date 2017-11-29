<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreColumsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name');
             $table->string('middle_name');
             $table->string('last_name');
            $table->string('phone_number')->unique();
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('profession');
            $table->string('id_number');
            $table->string('system_code');

             $table->string('avatar')->default('default.jpg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
