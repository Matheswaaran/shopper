<?php
	include "includes/config.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$manu_name= $_POST["manu_name"];
		$manu_address=$_POST["manu_address"];
		$manu_email=$_POST["manu_email"];
		$manu_phnno=$_POST["manu_phnno"];

		$select_query = "SELECT * FROM manufacturer WHERE name = '$manu_name'";
		
		$register_query = "INSERT INTO `manufacturer`(`name`, `address`, `email`, `phone_no`) VALUES ('$manu_name','$manu_address','$manu_email',$manu_phnno)";
		
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");

		if ($select_res = mysqli_query($db,$select_query)) {
	        if (mysqli_num_rows($select_res) == 0){
	            if (mysqli_query($db,$register_query)){
	                echo '<script> alert("Manufacturer registered successfully.");</script>';
	                echo '<script> window.location="../adminHome.php"; </script>';
	            }else{
	                echo '<script> alert("Manufacturer registration falied.");</script>';
	                echo '<script> window.location="../adminHome.php"; </script>';
	            }
	        }else{
	            echo '<script> alert("Manufacturer already exists.");</script>';
	            echo '<script> window.location="../adminHome.php"; </script>';
	        }
	    }else{
	    	echo '<script> alert("Error. Plz try again");</script>';
	        echo '<script> window.location="../adminHome.php"; </script>';

	    }
	}
?>