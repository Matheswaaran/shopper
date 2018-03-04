<?php
	// include "includes/config.php";
	include "includes/sessionUtils.php";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$session = new sessionUtils();
		$login_username = $_POST["login_username"];
		$login_password = $_POST["login_password"];
//		$login_password = $session->encryptIt($login_password);
		$login_error = "";
		
		$login_query = "SELECT * FROM users WHERE username = '$login_username' AND password = '$login_password'";
		
		$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");
		
		if (mysqli_query($db,$login_query)){
			$login_res = mysqli_query($db,$login_query);
			if (mysqli_num_rows($login_res) == 1){
				$login_arr = mysqli_fetch_array($login_res);
				$session->UserLogin($login_arr['uid'],$login_arr['email'],$login_arr["username"]);
				header("location: ../home.php");
			}else{
				echo '<script> alert("Invalid credentials");</script>';
				echo '<script> window.location="../index.html"; </script>';
			}
		}else{
			echo '<script> alert("Login Error. Please Try Again.");</script>';
			echo '<script> window.location="../index.html"; </script>';
		}
	}
?>