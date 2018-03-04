<?php
	include "includes/config.php";

	function insertPic($product_code){
		if(isset($_FILES['product_img'])){
	      $errors= array();
	      $file_name = $_FILES['product_img']['name'];
	      $file_size = $_FILES['product_img']['size'];
	      $file_tmp = $_FILES['product_img']['tmp_name'];
	      $file_type = $_FILES['product_img']['type'];
	      $tmp = explode('.',$_FILES['product_img']['name']);
      	  $file_ext=strtolower(end($tmp));
	      $file_upload = $_SERVER["DOCUMENT_ROOT"]."/fwdproject/shopper-master/themes/images/products/";
	      $file_dir = "themes/images/products/";
	      
	      $expensions= array("jpeg","jpg","png");
	      
	      if(in_array($file_ext,$expensions)=== false){
	         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
	      }
	      
	      if(empty($errors)==true) {
	         move_uploaded_file($file_tmp,$file_upload.$product_code.".".$file_ext);
	         $GLOBALS["product_img"] = $file_dir.$product_code.".".$file_ext;
	         return true;
	      }else{
	         return false;
	      }
	   }else{
	   	echo "isset";
	   }
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
		$product_img = "";
		
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");

		$select_qurey = mysqli_query($db, "SELECT * FROM products WHERE product_code = '$product_code'");

		if (mysqli_num_rows($select_qurey) == 0) {
			if (insertPic($product_code)) {
				$product_query = "INSERT INTO products(product_name,brand,product_code,price,mid,availability,description,size,color,photo) VALUES ('$product_name', '$product_brand', '$product_code', $product_price, '$product_manu', $product_avail, '$product_desc', '$product_size', '$product_color', '$product_img')";
				if (mysqli_query($db,$product_query)) {
					echo '<script> alert("Product Added Successfully.");</script>';
					echo '<script> window.location="../adminHome.php"; </script>';
				}else{
					echo '<script> alert("Failed to add Product. Query Error!");</script>';
					echo '<script> window.location="../adminHome.php"; </script>';
				}
			}else{
				echo '<script> alert("Image Error.");</script>';
				echo '<script> window.location="../adminHome.php"; </script>';
			}
		}else{
			echo '<script> alert("Product Already Exists.");</script>';
			echo '<script> window.location="../adminHome.php"; </script>';
		}
	}
?>