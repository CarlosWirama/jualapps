<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAccountStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_account_statuses', function (Blueprint $table) {
            $table->bigIncrements('user_account_status_id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('account_status');
            $table->timestamp('created_at');
        });
        
        Schema::table('user_account_statuses', function ($table) {
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
        Schema::drop('user_account_statuses');
    }
}
