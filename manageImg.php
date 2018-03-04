<?php
	include 'php/includes/sessionUtils.php';

	$session = new sessionUtils();
	$session->checkAdminSession($_SESSION["admin_username"]);

	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");
	$Select_img = "SELECT * FROM images";
	$img_res = mysqli_query($db,$Select_img);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Bootstrap E-commerce Templates</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">
							<li><a href="adminHome.php">Add New Products/Manufacturer</a></li>
							<li><a href="manageManu.php">Manufacturers</a></li>
							<li><a href="manageProd.php">Products</a></li>
							<li><a href="manageBills.php">Bills</a></li>
							<li><a href="manageImg.php">Images</a></li>
							<li><a href="php/logout.php">Logout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
			</section>			
			<section class="main-content">				
				<div class="row">
					<div class="span5">					
						<h4 class="title"><span class="text"><strong>ADD</strong>IMAGES</span></h4>
						<form action="php/createImg.php" method="post" enctype = "multipart/form-data" id="newProductForm">
							<input type="hidden" name="next" value="/">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Select Image</label>
									<div class="controls">
										<input type="file" id="img" name="img" class="input-xlarge" required>
									</div>
								</div>
								<hr>
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Create Product"></div>
							</fieldset>
						</form>
					</div>
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Photos</strong> of the product</span></h4>
						<fieldset>
							<form action="php/removeImg.php" method="post">
							<fieldset>
								<table class="table table-striped shop_attributes">
									<tbody>
										<tr>
											<th>Select</th>
											<th>Image</th>
										</tr>
										<?php $i = 1; while ($img_arr = mysqli_fetch_array($img_res)) { ?>
										<tr>
											<td style="width: 10%;height: 5%;"><input type="checkbox" name="check[<?php $i ?>]" value="<?php echo $img_arr["imgid"] ?>"></td>
											<td style="width: 10%;height: 5%;"><img src="<?php echo "../".$img_arr["link"]; ?>"></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="delete" value="Delete"></div>
							</fieldset>
						</form>
						</fieldset>					
					</div>
				</div>
			</section>
			<section id="copyright">
				<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.html";
				})
			});
		</script>		
    </body>
</html>