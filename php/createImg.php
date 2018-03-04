<?php

	include 'includes/config.php';

	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");


	if(isset($_FILES['img'])){
      $errors= array();
      $file_name = $_FILES['img']['name'];
      $file_size = $_FILES['img']['size'];
      $file_tmp = $_FILES['img']['tmp_name'];
      $file_type = $_FILES['img']['type'];
      $tmp = explode('.',$_FILES['img']['name']);
  	  $file_ext=strtolower(end($tmp));
      $file_upload = $_SERVER["DOCUMENT_ROOT"]."/fwdproject/images/";
      $file_dir = "images/";
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if(empty($errors)==true) {

      	$sel_arr = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM `images` WHERE imgid=(SELECT MAX(imgid) FROM `images`)"));
      	$img_id = $sel_arr["imgid"] + 1;
        move_uploaded_file($file_tmp,$file_upload.$img_id.".".$file_ext);
        $insert_img = $file_dir.$img_id.".".$file_ext;
        mysqli_query($db,"INSERT INTO images(link) VALUES('$insert_img')");
        echo '<script> alert("Success!");</script>';
      	echo '<script> window.location="../manageImg.php"; </script>';
      }else{
        echo '<script> alert("ERROR!");</script>';
      	echo '<script> window.location="../manageImg.php"; </script>';
      }
   }else{
        echo '<script> alert("ERROR! Isset");</script>';
      	echo '<script> window.location="../manageImg.php"; </script>';
   }
?>