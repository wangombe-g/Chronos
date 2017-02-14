<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductImage extends Migration
{
    /**
     * Run the migrations.
     *
    CREATE TABLE `product_image` (
      `id` bigint(20) NOT NULL,
      `product_id` bigint(20) NOT NULL,
      `type` varchar(254) NOT NULL,
      `url` varchar(254) NOT NULL,
      `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
     * @return void
     */
    public function up()
    {
       Schema::create('product_image', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('client_uuid');
            $table->bigInteger('o_id');
            $table->bigInteger('product_id');
            $table->string('type');
            $table->string('url');
            $table->dateTime('last_modified_date');
            $table->dateTime('created_date');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_image');
    }
}
