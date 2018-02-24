<?php
	include "includes/config.php";

	function insertPic(){

	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
		$product_name = $_POST["product_name"];
		$product_code = $_POST["product_code"];
		$product_brand = $_POST["product_brand"];
		$product_price = $_POST["product_price"];
		$product_manu = $_POST["product_manu"];
		$product_avail = $_POST["product_avail"];
		$product_desc = $_POST["product_desc"];
		$product_size = $_POST["product_size"];
		$product_color = $_POST["product_color"];
		$product_img["0"] = $_POST["product_img1"];
		$product_img["1"] = $_POST["product_img2"];
		$product_img["2"] = $_POST["product_img3"];
		$product_img["3"] = $_POST["product_img4"];
		
		$register_query = "INSERT INTO products(product_name,brand,product_code,price,mid,availability,description,size,color,photo_1,photo_2,photo_3,photo_4) VALUES ($product_name, $product_brand, $product_code, $product_price, $product_manu, $product_avail, $product_desc, $product_size, $product_color, $product_img1, $product_img2, $roduct_img3, $product_img4)";
		
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");
	}
?>