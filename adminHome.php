<?php
	include 'php/includes/sessionUtils.php';

	$session = new sessionUtils();
	$session->checkAdminSession($_SESSION["admin_username"]);
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
							<li><a href="adminLogin.html">Administrator Login</a></li>
							<li><a href="index.html">Login</a></li>
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
						<h4 class="title"><span class="text"><strong>ADD</strong> NEW PRODUCTS</span></h4>
						<form action="php/createProd.php" method="post">
							<input type="hidden" name="next" value="/">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Product Name</label>
									<div class="controls">
										<input type="text" placeholder="Enter the Product Name" id="product_name" name="product_name" class="input-xlarge" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Product Code</label>
									<div class="controls">
										<input type="text" placeholder="Enter the product code" id="product_code" name="product_code" class="input-xlarge" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Brand</label>
									<div class="controls">
										<input type="text" placeholder="Enter the Brand" id="product_brand" name="product_brand" class="input-xlarge" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Price</label>
									<div class="controls">
										<input type="text" placeholder="Enter the price" id="product_price" name="product_price" class="input-xlarge" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Manufacturer</label>
									<div class="controls">
										<input type="text" placeholder="Enter the Manufacturer" id="product_manu" name="product_manu" class="input-xlarge" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Availability</label>
									<div class="controls">
										<input type="text" placeholder="Enter the Availability" id="product_avail" name="product_avail" class="input-xlarge" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Description</label>
									<div class="controls">
										<input type="text" placeholder="Enter the Product Description" id="product_desc" name="product_desc" class="input-xlarge" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Sizes</label>
									<div class="controls">
										<input type="text" placeholder="Enter the Product size" id="product_size" name="product_size" class="input-xlarge" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Color</label>
									<div class="controls">
										<input type="text" placeholder="Enter the Product Color" id="product_color" name="product_color" class="input-xlarge" required>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="span7">					
							<h4 class="title"><span class="text"><strong>Photos</strong> of the product</span></h4>
								<fieldset>
									<div class="control-group">
										<label class="control-label">File 1</label>
										<div class="controls">
											<input type="file" id="product_img1" name="product_img1" class="input-xlarge" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">File 2</label>
										<div class="controls">
											<input type="file" id="product_img2" name="product_img2" class="input-xlarge" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">File 3</label>
										<div class="controls">
											<input type="file" id="product_img3" name="product_img3" class="input-xlarge" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">File 4</label>
										<div class="controls">
											<input type="File" id="product_img4" name="product_img4" class="input-xlarge" required>
										</div>
									</div>
									<hr>
									<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Create Product"></div>
								</fieldset>
							</form>					
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