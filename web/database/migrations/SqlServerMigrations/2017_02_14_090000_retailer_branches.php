<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RetailerBranches extends Migration
{
    /**
     * Run the migrations.
     *
    CREATE TABLE `retailer_branches` (
      `id` bigint(20) NOT NULL,
      `user_id` bigint(20) NOT NULL,
      `branch_id` bigint(20) NOT NULL,
      `last_modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
      `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
     * @return void
     */
    public function up()
    {
       Schema::create('retailer_branches', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('client_uuid');
            $table->bigInteger('o_id');
            $table->bigInteger('user_id');
            $table->bigInteger('branch_id');
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
        Schema::dropIfExists('retailer_branches');
    }
}
