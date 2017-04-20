<?php
namespace App;



class Queries {	

	public static function AllTables()
	{
		
		return array(
			"sms_received" => "SELECT * FROM sms_received",
			"groups" => "SELECT * FROM groups",
			"jpollingstation" => "SELECT * FROM jpollingstation",
		);
	}

}