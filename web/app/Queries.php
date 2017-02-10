<?php
namespace App;

class Queries {	

	public static function AllTables()
	{
		return array(
			"branch" => "SELECT DISTINCT * FROM branch",
			"cart" => "SELECT DISTINCT * FROM cart",
			"category" => "SELECT DISTINCT * FROM category",
			"changing_info" => "SELECT DISTINCT * FROM charging_info",
			"invoiced_products" => "SELECT DISTINCT * FROM invoiced_products",
			"invoice" => "SELECT DISTINCT * FROM invoice",
			"personal_info" => "SELECT DISTINCT * FROM personal_info",
			"product" => "SELECT DISTINCT * FROM product",
			"product_available_branch" => "SELECT DISTINCT * FROM product_available_branch",
			"product_category" => "SELECT DISTINCT * FROM product_category",
			"product_image" => "SELECT DISTINCT * FROM product_image",
			"retailer_branches" => "SELECT DISTINCT * FROM retailer_branches",
			"retailer_info" => "SELECT DISTINCT * FROM retailer_info",
			"subscriber_info" => "SELECT DISTINCT * FROM subscriber_info"
		);
	}
}