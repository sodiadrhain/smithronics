<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('messages', function (Blueprint $table) {
      $table->increments('id');
      $table->text('content');
      $table->string('title');
      $table->integer('sender_id');
      $table->integer('receiver_id');
      $table->tinyInteger('status')->default(0);
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
      Schema::drop('messages');
    }
}
