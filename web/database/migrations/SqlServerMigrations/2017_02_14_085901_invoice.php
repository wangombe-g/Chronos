<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Invoice extends Migration
{
    /**
     * Run the migrations.
     *

    CREATE TABLE `invoice` (
      `id` bigint(20) NOT NULL,
      `invoice_no` varchar(254) NOT NULL,
      `user_id` bigint(20) NOT NULL,
      `session_id` varchar(254) NOT NULL,
      `channel` varchar(254) NOT NULL,
      `payment_instrument` varchar(254) NOT NULL,
      `account_id` varchar(254) DEFAULT NULL,
      `delivery_address` varchar(254) DEFAULT NULL,
      `status` varchar(254) NOT NULL,
      `sub_total` varchar(254) DEFAULT NULL,
      `service_charges` double DEFAULT NULL,
      `currency` varchar(254) NOT NULL,
      `invoiced_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
      `retailer_updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
      `contact_person` varchar(256) DEFAULT NULL,
      `contact_no` varchar(20) DEFAULT NULL,
      `transport_fare` double NOT NULL,
      `total_amount` double DEFAULT NULL,
      `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

     * @return void
     */
    public function up()
    {
       Schema::create('invoice', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('client_uuid');
            $table->bigInteger('o_id');
            $table->string('invoice_no');
            $table->bigInteger('user_id');
            $table->string('session_id');
            $table->string('channel');
            $table->string('payment_instrument');
            $table->string('account_id');
            $table->string('delivery_address');
            $table->string('status');
            $table->string('sub_total');
            $table->double('service_charges');
            $table->string('currency');
            $table->dateTime('invoiced_time');
            $table->dateTime('retailer_updated_time');
            $table->string('contact_person');
            $table->string('contact_no');
            $table->double('transport_fare');
            $table->double('total_amount');
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
        Schema::dropIfExists('invoice');
    }
}
