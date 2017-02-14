<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductAvailableBranch extends Migration
{
    /**
     * Run the migrations.
     *

CREATE TABLE `product_available_branch` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `branch_id` bigint(20) NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
     * @return void
     */
    public function up()
    {
       Schema::create('product_available_branch', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('client_uuid');
            $table_>bigInteger('o_id');
            $table_>bigInteger('product_id');
            $table_>bigInteger('branch_id');
            $table_>dateTime('last_modified_date');
            $table_>dateTime('created_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_available_branch');
    }
}
