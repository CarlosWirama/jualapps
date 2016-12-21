<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_packages', function (Blueprint $table) {
            $table->bigIncrements('user_package_id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('product_package_id')->unsigned();
            $table->string('transaction_progress');
            $table->timestamp('expired_at')->nullable();
        });

        Schema::table('user_packages', function ($table) {
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('product_package_id')->references('product_package_id')->on('product_packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_packages');
    }
}
