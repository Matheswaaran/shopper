<?php
  include 'includes/config.php';

  $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");

  if(isset($_POST['delete'])){
    if(isset($_POST['check'])){
      foreach ($_POST['check'] as $value){
        $approve_sql = mysqli_query($db,"DELETE FROM products WHERE pid = $value");
        if ($approve_sql) {
          echo '<script> alert("Products Deleted successfully.");</script>';
          echo '<script> window.location="../manageProd.php"; </script>';
        }
      }
    }else{
      echo '<script> alert("Please Select some Products");</script>';
      echo '<script> window.location="../manageProd.php"; </script>';
    }
  }else{
    echo '<script> window.location="../manageProd.php"; </script>';
  }

  if(isset($_POST['update'])){
    $product_avail = $_POST["product_avail"];
    if(isset($_POST['check'])){
      foreach ($_POST['check'] as $value){
        $approve_sql = mysqli_query($db,"UPDATE `products` SET availability = '$product_avail' WHERE pid = '$value'");
        if ($approve_sql) {
          echo '<script> alert("Products Updated successfully.");</script>';
          echo '<script> window.location="../manageProd.php"; </script>';
        }
      }
    }else{
      echo '<script> alert("Please Select some Products");</script>';
      echo '<script> window.location="../manageProd.php"; </script>';
    }
  }else{
    echo '<script> window.location="../manageProd.php"; </script>';
  }
?>