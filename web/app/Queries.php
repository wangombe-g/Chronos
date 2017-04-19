<?php
namespace App;



class Queries {	

	public static function AllTablesWithTimeConstraint($lastSyncDate)
	{
		return array(
			"branch" => "SELECT * FROM branch WHERE last_modified_date >= '$lastSyncDate'",
			"cart" => "SELECT * FROM cart WHERE last_modified_date >= '$lastSyncDate'",
			"category" => "SELECT * FROM category WHERE last_modified_date >= '$lastSyncDate'",
			"changing_info" => "SELECT * FROM charging_info WHERE last_modified_date >= '$lastSyncDate'",
			"invoiced_products" => "SELECT * FROM invoiced_products WHERE last_modified_date >= '$lastSyncDate'",
			"invoice" => "SELECT * FROM invoice WHERE last_modified_date >= '$lastSyncDate'",
			"personal_info" => "SELECT * FROM personal_info WHERE last_modified >= '$lastSyncDate'",
			"product" => "SELECT * FROM product WHERE last_modified_date >= '$lastSyncDate'",
			"product_available_branch" => "SELECT * FROM product_available_branch WHERE last_modified_date >= '$lastSyncDate'",
			"product_category" => "SELECT * FROM product_category WHERE last_modified_date >= '$lastSyncDate'",
			"product_image" => "SELECT * FROM product_image WHERE last_modified_date >= '$lastSyncDate'",
			"retailer_branches" => "SELECT * FROM retailer_branches WHERE last_modified_date >= '$lastSyncDate'",
			"retailer_info" => "SELECT * FROM retailer_info WHERE last_modified >= '$lastSyncDate'",
			"subscriber_info" => "SELECT * FROM subscriber_info WHERE last_modified >= '$lastSyncDate'",
			"user_account" => "SELECT * FROM user_account WHERE last_modified >= '$lastSyncDate'",
			"gnote_imports" => "SELECT * FROM gnote_imports WHERE created >= '$lastSyncDate'",
		);
	}

	

	public static function AllTables()
	{
		
		return array(
			"branch" => "SELECT * FROM branch",
			"cart" => "SELECT * FROM cart",
			"category" => "SELECT * FROM category",
			"changing_info" => "SELECT * FROM charging_info",
			"invoiced_products" => "SELECT * FROM invoiced_products",
			"invoice" => "SELECT * FROM invoice",
			"personal_info" => "SELECT * FROM personal_info",
			"product" => "SELECT * FROM product",
			"product_available_branch" => "SELECT * FROM product_available_branch",
			"product_category" => "SELECT * FROM product_category",
			"product_image" => "SELECT * FROM product_image",
			"retailer_branches" => "SELECT * FROM retailer_branches",
			"retailer_info" => "SELECT * FROM retailer_info",
			"subscriber_info" => "SELECT * FROM subscriber_info",
			"user_account" => "SELECT * FROM user_account",
			"gnote_imports" => "SELECT * FROM gnote_imports",
		);
	}

	public static function GovernorTablesWithTimeConstriant($lastSyncDate)
	{
		return array(
			"sms_received" => "SELECT * FROM sms_received WHERE created >= '$lastSyncDate'",
		);
	}
	public static function GovernorTables()
	{
		return array(
			"sms_received" => "SELECT * FROM sms_received",
		);
	}
}