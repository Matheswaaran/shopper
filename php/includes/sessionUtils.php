<?php
	
	class sessionUtils{
		function __construct(){
			if (session_status() == PHP_SESSION_NONE){
				session_start();
//				include "config.php";
			}
		}
		
		public function UserLogin($id,$email){
			$_SESSION['user_id'] = $id;
			$_SESSION['user_email'] = $email;
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
				$ses_sql = mysqli_query($db,"SELECT * FROM users WHERE regno = '$userChk'");
				$row = mysqli_fetch_array($ses_sql, MYSQL_ASSOC);
				$user_regno = $row['regno'];
				
				if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_regno']) && !isset($_SESSION['user_year']) && !isset($_SESSION['user_sec'])){
					header("location: index.html");
				}
			}catch (exception $e){
				echo '<script> alert("' . $e . '"");</script>';
			}
		}
	}
?>