<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('user_detail_id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('phone');
            $table->integer('postalcode');
            $table->enum('gender',['male','female','other']);
            $table->text('address');
            $table->string('city');
            $table->date('birthdate');
            $table->timestamp('created_at');
        });

        Schema::table('user_details', function ($table) {
            $table->foreign('user_id')->references('user_id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_details');
    }
}
