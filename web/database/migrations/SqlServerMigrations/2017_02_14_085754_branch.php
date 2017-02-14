<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Branch extends Migration
{
    /**
     * Run the migrations.

    CREATE TABLE `branch` (
      `id` bigint(20) NOT NULL,
      `name` varchar(254) NOT NULL,
      `address` varchar(254) NOT NULL,
      `description` varchar(254) NOT NULL,
      `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
      `status` varchar(20) NOT NULL DEFAULT 'ACTIVE'
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

     *
     * @return void
     */
    public function up()
    {
       Schema::create('branch', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('client_uuid');
            $table->bigInteger('o_id');
            $table->string('name');
            $table->string('address');
            $table->string('description');
            $table->dateTime('last_modified_date');
            $table->dateTime('created_date');
            $table->string('status')->default('ACTIVE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch');
    }
}