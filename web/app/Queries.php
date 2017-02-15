<?php
namespace App;



class Queries {	

	public static function AllTablesWithTimeConstraint($time)
	{
		
		return array(
			"branch" => "SELECT * FROM branch WHERE last_modified_date  > (NOW() - INTERVAL $time DAY)",
			"cart" => "SELECT * FROM cart WHERE last_modified_date  > (NOW() - INTERVAL $time DAY)",
			"category" => "SELECT * FROM category WHERE last_modified_date  > (NOW() - INTERVAL $time DAY)",
			"changing_info" => "SELECT * FROM charging_info WHERE last_modified_date  > (NOW() - INTERVAL $time DAY)",
			"invoiced_products" => "SELECT * FROM invoiced_products WHERE last_modified_date  > (NOW() - INTERVAL $time DAY)",
			"invoice" => "SELECT * FROM invoice WHERE last_modified_date  > (NOW() - INTERVAL $time DAY)",
			"personal_info" => "SELECT * FROM personal_info WHERE last_modified  > (NOW() - INTERVAL $time DAY)",
			"product" => "SELECT * FROM product WHERE last_modified_date  > (NOW() - INTERVAL $time DAY)",
			"product_available_branch" => "SELECT * FROM product_available_branch WHERE last_modified_date  > (NOW() - INTERVAL $time DAY)",
			"product_category" => "SELECT * FROM product_category WHERE last_modified_date  > (NOW() - INTERVAL $time DAY)",
			"product_image" => "SELECT * FROM product_image WHERE last_modified_date  > (NOW() - INTERVAL $time DAY)",
			"retailer_branches" => "SELECT * FROM retailer_branches WHERE last_modified_date  > (NOW() - INTERVAL $time DAY)",
			"retailer_info" => "SELECT * FROM retailer_info WHERE last_modified  > (NOW() - INTERVAL $time DAY)",
			"subscriber_info" => "SELECT * FROM subscriber_info WHERE last_modified  > (NOW() - INTERVAL $time DAY)",
			"user_account" => "SELECT * FROM user_account WHERE last_modified  > (NOW() - INTERVAL $time DAY)",
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
		);
	}
}