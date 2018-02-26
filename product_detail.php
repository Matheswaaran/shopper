<?php
	include "php/includes/sessionUtils.php";

	$session = new sessionUtils();

	$session->checkSession($_SESSION["user_name"]);

	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");
	$pid = $_GET["pid"];
	$prod_arr = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM products WHERE pid = '$pid'"));
	$manu_arr = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM manufacturer WHERE mid = " . $prod_arr["mid"] . ";"));
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
		<link href="themes/css/main.css" rel="stylesheet"/>
		<link href="themes/css/jquery.fancybox.css" rel="stylesheet"/>
				
		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<script src="themes/js/jquery.fancybox.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<form method="POST" class="search_form">
						<input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt">
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">
							<li><a href="home.php">Home</a></li>
							<li><a href="cart.html">Your Order</a></li>
							<li><a href="php/logout.php">Logout</a></li>
							<li>Hi! <?php echo $_SESSION["user_name"]; ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<h4><span>Product Detail</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">						
					<div class="span9">
						<div class="row">
							<div class="span4">
								<a href="themes/images/ladies/1.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="<?=$prod_arr["photo"]?>"></a>
							</div>
							<div class="span5">
								<address>
									<strong>Brand:</strong> <span><?= $prod_arr["brand"]; ?></span><br>
									<strong>Product Code:</strong> <span><?= $prod_arr["product_code"]; ?></span><br>
									<strong>Reward Points:</strong> <span><?= $prod_arr["reward_points"]; ?></span><br>
									<strong>Availability:</strong> <span><?= $prod_arr["availability"]; ?></span><br>								
								</address>									
								<h4><strong>Price: ₹<?= $prod_arr["price"]; ?></strong></h4>
							</div>
							<div class="span5">
								<form class="form-inline">
									<label class="checkbox">
										<input type="checkbox" value=""> Option one is this and that
									</label>
									<br/>
									<label class="checkbox">
									  <input type="checkbox" value=""> Be sure to include why it's great
									</label>
									<p>&nbsp;</p>
									<label>Qty:</label>
									<input type="text" class="span1" placeholder="1">
									<button class="btn btn-inverse" type="submit">Add to cart</button>
								</form>
							</div>							
						</div>
						<div class="row">
							<div class="span9">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active"><a href="#home">Description</a></li>
									<li class=""><a href="#profile">Additional Information</a></li>
								</ul>							 
								<div class="tab-content">
									<div class="tab-pane active" id="home"><?= $prod_arr["description"]; ?><br><br></div>
									<div class="tab-pane" id="profile">
										<table class="table table-striped shop_attributes">	
											<tbody>
												<tr class="">
													<th>Size</th>
													<td><?= $prod_arr["size"]; ?></td>
												</tr>		
												<tr class="alt">
													<th>Colour</th>
													<td><?= $prod_arr["color"]; ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>							
							</div>
						</div>
					</div>
					<div class="span3 col">
						<div class="block">
							<ul class="nav nav-list below">
								<li class="nav-header">MANUFACTURER</li>
								<li><strong>Name: </strong> <span><?= $manu_arr["name"]; ?></span><br></li>
								<li><strong>Address: </strong> <span><?= $manu_arr["address"]; ?></span><br></li>
								<li><strong>Email: </strong> <span><?= $manu_arr["email"]; ?></span><br></li>
								<li><strong>Contact No.: </strong> <span><?= $manu_arr["phone_no"]; ?></span><br></li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<section id="copyright">
				<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(function () {
				$('#myTab a:first').tab('show');
				$('#myTab a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
				})
			})
			$(document).ready(function() {
				$('.thumbnail').fancybox({
					openEffect  : 'none',
					closeEffect : 'none'
				});
				
				$('#myCarousel-2').carousel({
                    interval: 2500
                });								
			});
		</script>
    </body>
</html>