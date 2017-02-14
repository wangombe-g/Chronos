<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonalInfo extends Migration
{
    /**
     * Run the migrations.
     *
    CREATE TABLE `personal_info` (
      `id` bigint(20) NOT NULL,
      `user_id` bigint(20) NOT NULL,
      `first_name` varchar(254) NOT NULL,
      `last_name` varchar(254) NOT NULL,
      `address` varchar(254) DEFAULT NULL,
      `state` varchar(254) DEFAULT NULL,
      `province` varchar(254) DEFAULT NULL,
      `country` varchar(254) DEFAULT NULL,
      `profession` varchar(254) DEFAULT NULL,
      `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
      `last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
     * @return void
     */
    public function up()
    {
       Schema::create('personal_info', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('client_uuid');
            $table->bigInteger('o_id');
            $table->bigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('state');
            $table->string('province');
            $table->string('country');
            $table->string('profession');
            $table->dateTime('created_at');
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
        Schema::dropIfExists('personal_info');
    }
}
