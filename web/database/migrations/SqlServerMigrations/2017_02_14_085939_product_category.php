<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductCategory extends Migration
{
    /**
     * Run the migrations.
     *
    CREATE TABLE `product_category` (
      `id` bigint(20) NOT NULL,
      `product_id` bigint(20) NOT NULL,
      `category_id` bigint(20) NOT NULL,
      `is_default` tinyint(1) NOT NULL,
      `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

     * @return void
     */
    public function up()
    {
       Schema::create('product_category', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('client_uuid');
            $table->bigInteger('o_id');
            $table->bigInteger('product_id');
            $table->bigInteger('category_id');
            $table->tinyInt('is_default');
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
        Schema::dropIfExists('product_category');
    }
}
