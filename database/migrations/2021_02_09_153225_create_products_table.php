<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('product_title')->unique();
            $table->string('slug')->unique();
            $table->text('sort_desc');
            $table->text('long_desc');
            $table->integer('price');
            $table->enum('status',['active','inactive']);
            $table->string('first_image')->unique();
            $table->string('second_image')->unique();
            $table->string('third_image')->unique();
            $table->string('fourth_image')->unique();
            $table->timestamps();
            $table->foreign('category_id')->on('categories')->references('id')->onDelete('cascade');
            $table->foreign('brand_id')->on('brands')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
