<?php
  include 'includes/config.php';

  $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");

  if(isset($_POST['remove'])){
    if(isset($_POST['check'])){
      foreach ($_POST['check'] as $value){
        $approve_sql = mysqli_query($db,"DELETE FROM bills WHERE bid = $value");
        if ($approve_sql) {
        	echo '<script> alert("Order Removed successfully.");</script>';
			    echo '<script> window.location="../cart.php"; </script>';
        }
      }
    }else{
      echo '<script> alert("Please Select some Orders");</script>';
      echo '<script> window.location="../cart.php"; </script>';
    }
  }else{
    echo '<script> window.location="../cart.php"; </script>';
  }
?>