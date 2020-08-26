<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToUserNewNw extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->string('sur_name');
        $table->string('first_name');
        $table->string('other_name');
        $table->string('day');
        $table->string('month');
        $table->string('year');
        $table->string('state_of_origin');
        $table->string('lga');
        $table->string('sex');
        $table->string('marital_status');
        $table->string('religion');
        $table->string('nature_of_business');
        $table->string('residential_address');
        $table->string('office_address');
        $table->text('purpose_of_joining');
        $table->string('targeted_amount');
        $table->string('card_payment');
        $table->string('payment_option');
        $table->string('next_kin_name');
        $table->string('next_kin_day');
        $table->string('next_kin_month');
        $table->string('next_kin_year');
        $table->string('next_kin_relationship');
        $table->string('next_kin_phone');










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
