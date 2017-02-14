<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubscriberInfo extends Migration
{
    /**
     * Run the migrations.
     *
    CREATE TABLE `subscriber_info` (
      `id` bigint(20) NOT NULL,
      `user_id` bigint(20) NOT NULL,
      `mpin` varchar(254) NOT NULL,
      `year_of_birth` varchar(254) NOT NULL,
      `msisdn` varchar(254) NOT NULL,
      `mothers_maiden_name` varchar(254) NOT NULL,
      `identity_no` varchar(254) NOT NULL,
      `verification_code` varchar(254) DEFAULT NULL,
      `verification_codes_sent` int(11) DEFAULT NULL,
      `last_verified_code_sent_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
      `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
      `last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
     * @return void
     */
    public function up()
    {
       Schema::create('subscriber_info', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('client_uuid');
            $table->bigInteger('o_id');
            $table->bigInteger('user_id');
            $table->string('mpin');
            $table->string('year_of_birth');
            $table->string('msisdn');
            $table->string('mothers_maiden_name');
            $table->string('identity_no');
            $table->string('verification_code');
            $table->integer('verification_codes_sent');
            $table->dateTime('last_verified_code_sent_time');
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
        Schema::dropIfExists('subscriber_info');
    }
}
