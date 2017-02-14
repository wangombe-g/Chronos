<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvoicedProducts extends Migration
{
    /**
     * Run the migrations.
     *
    CREATE TABLE `invoiced_products` (
      `id` bigint(20) NOT NULL,
      `invoice_id` bigint(20) NOT NULL,
      `product_id` bigint(20) NOT NULL,
      `no_of_units` int(11) NOT NULL,
      `is_delivery_required` tinyint(1) NOT NULL,
      `status` varchar(254) NOT NULL,
      `delivered_or_issued_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
      `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
     * @return void
     */
    public function up()
    {
       Schema::create('invoiced_products', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('client_uuid');
            $table->bigInteger('o_id');
            $table->bigInteger('invoice_id');
            $table->bigInteger('product_id');
            $table->integer('no_of_units');
            $table->tinyInteger('is_delivery_required');
            $table->string('status');
            $table->dateTime('delivered_or_issued_date');
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
        Schema::dropIfExists('invoiced_products');
    }
}
