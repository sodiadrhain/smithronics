<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('order_list', function (Blueprint $table) {
      $table->increments('id');
      $table->string('alt_phone');
      $table->string('delivery_address');
      $table->string('delivery_state');
      $table->string('delivery_address_type');
      $table->integer('user_id');
      $table->integer('pay_id');
      $table->integer('post_id');
      $table->tinyInteger('status')->default(1);
      $table->timestamps();
      $table->string('order_token')->nullable();
        });
        Schema::create('pay_list', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id');
        $table->integer('order_id');
        $table->tinyInteger('status')->default(1);
        $table->timestamps();
        $table->string('amount');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_list');
              Schema::drop('pay_list');
    }
}
