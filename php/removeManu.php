<?php
  include 'includes/config.php';

  $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");

  if(isset($_POST['delete'])){
    if(isset($_POST['check'])){
      foreach ($_POST['check'] as $value){
        $approve_sql = mysqli_query($db,"DELETE FROM manufacturer WHERE mid = $value");
        if ($approve_sql) {
        	echo '<script> alert("Manufacturers Deleted successfully.");</script>';
			    echo '<script> window.location="../manageManu.php"; </script>';
        }
      }
    }else{
      echo '<script> alert("Please Select some Manufacturers");</script>';
      echo '<script> window.location="../manageManu.php"; </script>';
    }
  }else{
    echo '<script> window.location="../manageManu.php"; </script>';
  }
?>