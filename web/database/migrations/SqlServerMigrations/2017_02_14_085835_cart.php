<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cart extends Migration
{
    /**
     * Run the migrations.

  CREATE TABLE `cart` (
    `id` bigint(20) NOT NULL,
    `user_id` bigint(20) NOT NULL,
    `product_id` bigint(20) NOT NULL,
    `no_of_units` int(11) NOT NULL,
    `added_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    `status` varchar(254) NOT NULL,
    `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
     *
     * @return void
     */
    public function up()
    {
       Schema::create('cart', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('client_uuid');
            $table->bigInteger('o_id');
            $table->bigInteger('user_id');
            $table->bigInteger('product_id');
            $table->integer('no_of_units');
            $table->string('status');
            $table->dateTime('created_date');
            $table->dateTime('added_time');
            $table->dateTime('last_modified_date');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}