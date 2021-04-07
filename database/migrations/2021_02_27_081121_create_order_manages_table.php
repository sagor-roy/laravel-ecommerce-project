<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderManagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_manages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('payment_type');
            $table->unsignedBigInteger('sub_total');
            $table->unsignedBigInteger('total')->nullable();
            $table->unsignedBigInteger('coupon_discount')->nullable();
            $table->string('invoice_no');
            $table->enum('process',['waiting','shifted','return'])->nullable();
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
        Schema::dropIfExists('order_manages');
    }
}
