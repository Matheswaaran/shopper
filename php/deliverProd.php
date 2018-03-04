<?php
  include 'includes/config.php';

  $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");

  if(isset($_POST['delivered'])){
    if(isset($_POST['check'])){
      foreach ($_POST['check'] as $value){
        $approve_sql = mysqli_query($db,"UPDATE bills SET delivered = '1' WHERE bid = $value");
        if ($approve_sql) {
        	echo '<script> alert("Products marked as delivered.");</script>';
			    echo '<script> window.location="../manageBills.php"; </script>';
        }
      }
    }else{
      echo '<script> alert("Please Select some Products");</script>';
      echo '<script> window.location="../manageBills.php"; </script>';
    }
  }else{
    echo '<script> window.location="../manageBills.php"; </script>';
  }
?>