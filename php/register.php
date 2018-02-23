<?php
	// include "includes/config.php";	
	include "includes/sessionUtils.php";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
		$session = new sessionUtils();
		
		$reg_username= $_POST["reg_username"];
		$reg_email=$_POST["reg_email"];
		$reg_password=$_POST["reg_password"];
//		$reg_password = $session->encryptIt($reg_password);
		
		$select_query = "SELECT * FROM users WHERE username = '$reg_username'";
		
		$register_query = "INSERT INTO users(username,email,password) VALUES ('$reg_username','$reg_email','$reg_password')";
		
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");

		if ($select_res = mysqli_query($db,$select_query)) {
	        if (mysqli_num_rows($select_res) == 0){
	            if (mysqli_query($db,$register_query)){
	                echo '<script> alert("User registered successfully.");</script>';
	                echo '<script> window.location="../index.html"; </script>';
	            }else{
	                echo '<script> alert("User registration falied.");</script>';
	                echo '<script> window.location="../index.html"; </script>';
	            }
	        }else{
	            echo '<script> alert("User already exists.");</script>';
	            echo '<script> window.location="../index.html"; </script>';
	        }
	    }else{
	    	echo '<script> alert("Error. Plz try again");</script>';
	        echo '<script> window.location="../index.html"; </script>';

	    }
	}
?>