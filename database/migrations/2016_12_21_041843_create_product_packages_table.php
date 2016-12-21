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
            $table->integer('product_id')->unsigned();
            $table->string('package_name');
            $table->text('description');
            $table->integer('price');
            $table->boolean('on_sale')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamp('created_at');
        });

        Schema::table('product_packages', function ($table) {
            $table->foreign('product_id')->references('product_id')->on('products');
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
