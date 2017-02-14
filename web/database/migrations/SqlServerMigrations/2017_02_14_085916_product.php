<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
    CREATE TABLE `product` (
      `id` bigint(20) NOT NULL,
      `name` varchar(254) NOT NULL,
      `description` varchar(254) NOT NULL,
      `price_amount` double NOT NULL,
      `currency` varchar(254) NOT NULL,
      `is_in_stock` tinyint(1) NOT NULL,
      `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
      `status` varchar(20) NOT NULL DEFAULT 'ACTIVE'
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
     * @return void
     */
    public function up()
    {
       Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->bigInteger('o_id');
            $table->string('name');
            $table->string('description');
            $table->double('price_amount');
            $table->string('currency');
            $table->tinyInteger('is_in_stock');
            $table->dateTime('last_modified_date');
            $table->dateTime('created_date');
            $table->string('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
