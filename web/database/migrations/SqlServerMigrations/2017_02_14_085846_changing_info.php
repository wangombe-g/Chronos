<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangingInfo extends Migration
{
    /**
     * Run the migrations.
     *

    CREATE TABLE `charging_info` (
      `id` bigint(20) NOT NULL,
      `invoice_id` bigint(20) NOT NULL,
      `tx_id` bigint(20) DEFAULT NULL,
      `type` varchar(254) NOT NULL,
      `long_description` varchar(254) DEFAULT NULL,
      `short_description` varchar(254) DEFAULT NULL,
      `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
      `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

     * @return void
     */
    public function up()
    {
       Schema::create('changing_info', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('client_uuid');
            $table->bigInteger('o_id');
            $table->bigInteger('invoice_id');
            $table->bigInteger('tx_id');
            $table->string('type');
            $table->string('long_description');
            $table->string('short_description');
            $table->dateTime('created_date');
            $table->dateTime('last_modified_date');
s        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('changing_info');
    }
}
