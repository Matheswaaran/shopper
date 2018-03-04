<?php
	include "includes/config.php";
	include "https://shopper-master.000webhostapp.com/mail.php";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$uid= $_POST["uid"];
		$pid=$_POST["pid"];
		$mid=$_POST["mid"];
		$amount=$_POST["amount"];
		$qty = $_POST["qty"];
		$total = $qty * $amount;

		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");
		
		$select_query = "SELECT * FROM bills WHERE uid = '$uid' AND pid = '$pid' AND delivered = '0'";
		
		$order_query = "INSERT INTO bills(uid,pid,mid,quantity,amount_per_item,total_amount) VALUES ('$uid','$pid','$mid','$qty','$amount','$total')";

		$update_avail_query = "UPDATE products SET availability = availability - '$qty' WHERE pid = '$pid'";

		$prod_arr = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM products WHERE pid = '$pid'"));
		$user_arr = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM users WHERE uid = '$uid'"));

		$mail_sub = "Online Shopping Mail";
		$mail_msg = "The order has been placed successfully." . PHP_EOL . "You have placed an order of " . $qty . "quantites of " . $prod_arr["product_name"] . "." . PHP_EOL . "Total Bill amount is " . $total . PHP_EOL;

		if ($qty > $prod_arr["availability"]) {
			echo "Enter a quantity that is equal to or less than the availability.";
			exit();
		}

		if ($select_res = mysqli_query($db,$select_query)) {
	        if (mysqli_num_rows($select_res) == 0){
	            if (mysqli_query($db,$order_query)){
	            	if (mysqli_query($db,$update_avail_query) && sendMail($user_arr["email"],$mail_sub,$mail_msg)) {
	            		echo "Order placed successfully.";
	            	}else{
	            		echo "Error! Cannot update availability.";
	            	}
	            }else{
	                echo "Order falied.";
	            }
	        }else{
	            echo "Order Already Exists. Please wait till it is delivered.";
	        }
	    }else{
	    	echo "Error! Plz try again";
	    }
	}
?>