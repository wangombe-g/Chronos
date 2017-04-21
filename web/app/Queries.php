<?php
namespace App;



class Queries {	

	public static function AllTables()
	{
		
		return array(
			"sms_received" => "SELECT * FROM sms_received WHERE message_type = 'GROUP' AND created >= '2017-04-21 04:00:00'",
      		//"groups" => "SELECT * FROM groups",
      		//"jpollingstation" => "SELECT * FROM jpollingstation",
		);
	}

	public static function AllTablesWithTimeConstraint($lastSyncDate)
	{
		return array(
			"sms_received" => "SELECT * FROM sms_received WHERE message_type = 'GROUP' AND created >= '$lastSyncDate'",
		);
	}

}