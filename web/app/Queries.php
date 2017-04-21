<?php
namespace App;



class Queries {	

	public static function AllTables()
	{
		
		return array(
			"sms_received" => "SELECT * FROM sms_received last_modified_date >= '2017-04-20 23:59:59'",
      		//"groups" => "SELECT * FROM groups",
      		//"jpollingstation" => "SELECT * FROM jpollingstation",
		);
	}

	public static function AllTablesWithTimeConstraint($lastSyncDate)
	{
		return array(
			"sms_received" => "SELECT * FROM sms_received WHERE last_modified_date >= '$lastSyncDate'",
		);
	}

}