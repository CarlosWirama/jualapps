<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_packages', function (Blueprint $table) {
            $table->increments('product_package_id');
            $table->integer('product_id');
            $table->string('package_name');
            $table->text('description');
            $table->integer('price');
            $table->boolean('on_sale');
            $table->boolean('is_active');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_packages');
    }
}
