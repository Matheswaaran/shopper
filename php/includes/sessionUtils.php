<?php
	
	class sessionUtils{
		function __construct(){
			if (session_status() == PHP_SESSION_NONE){
				session_start();
				include "config.php";
			}
		}
		
		public function UserLogin($id,$email,$username){
			$_SESSION['user_id'] = $id;
			$_SESSION['user_email'] = $email;
			$_SESSION["user_name"] = $username;
		}
		
		public function Logout(){
			session_destroy();
			return true;
		}
		
		function encryptIt( $q ) {
			$cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
			$qEncoded = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
			return( $qEncoded );
		}
		
		function decryptIt( $q ) {
			$cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
			$qDecoded = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
			return( $qDecoded );
		}
		
		function checkSession($userChk){
			
//			include "config.php";
			
			$db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_BASE) or die("Cannot connect to db..");
			try{
				$ses_sql = mysqli_query($db,"SELECT * FROM users WHERE username = '$userChk'");
				$row = mysqli_fetch_array($ses_sql);
				$user_name = $row['username'];
				
				if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_email']) && !isset($_SESSION['user_name'])){
					header("location: index.html");
				}
			}catch (exception $e){
				echo '<script> alert("' . $e . '"");</script>';
			}
		}
	}
?>