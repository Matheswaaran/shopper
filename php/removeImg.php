<?php
  include 'includes/config.php';

  $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");

  if(isset($_POST['delete'])){
    if(isset($_POST['check'])){
      foreach ($_POST['check'] as $value){
        $approve_sql = mysqli_query($db,"DELETE FROM images WHERE imgid = $value");
        if ($approve_sql) {
        	echo '<script> alert("Image Removed successfully.");</script>';
			    echo '<script> window.location="../manageImg.php"; </script>';
        }
      }
    }else{
      echo '<script> alert("Please Select some Images");</script>';
      echo '<script> window.location="../manageImg.php"; </script>';
    }
  }else{
    echo '<script> window.location="../manageImg.php"; </script>';
  }
?>