<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RetailerInfo extends Migration
{
    /**
     * Run the migrations.
     *
    CREATE TABLE `retailer_info` (
      `id` bigint(20) NOT NULL,
      `user_id` bigint(20) NOT NULL,
      `po_notify_required` tinyint(1) NOT NULL,
      `po_notify_method` varchar(254) NOT NULL,
      `email` varchar(254) DEFAULT NULL,
      `msisdn` varchar(254) DEFAULT NULL,
      `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
      `last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
     * @return void
     */
    public function up()
    {
       Schema::create('retailer_info', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('client_uuid');
            $table->bigInteger('o_id');
            $table->bigInteger('user_id');
            $table->tinyInteger('po_notify_required');
            $table->string('po_notify_method');
            $table->string('email');
            $table->string('msisdn');
            $table->string('created_at');
            $table->dateTime('last_modified');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retailer_info');
    }
}
