<?php
	include 'php/includes/sessionUtils.php';

	$session = new sessionUtils();
	$session->checkAdminSession($_SESSION["admin_username"]);

	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");
	$bill_res = mysqli_query($db,"SELECT * FROM bills");
	$bill_arr = mysqli_fetch_array($bill_res);
	$prod_arr = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM products WHERE pid = ". $bill_arr["pid"] .";"));
	$user_arr = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM users WHERE uid = ". $bill_arr["uid"] .";"));
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
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="themes/js/respond.min.js"></script>
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
				<h4><span>Your Orders</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">
					<div class="span12">					
						<h4 class="title"><span class="text"><strong>Your</strong> BILLS</span></h4>
						<form action="php/deliverProd.php" method="post">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Select</th>
										<th>User</th>
										<th>Image</th>
										<th>Product Name</th>
										<th>Quantity</th>
										<th>Amount per Item</th>
										<th>Total Amount</th>
										<th>Delivery Status</th>
									</tr>
								</thead>
								<tbody>
									<? $i = 1; while ($bill_arr = mysqli_fetch_array($bill_res)) { ?>
										<tr>
											<td><input type="checkbox" name="check[<?php $i ?>]" value="<?php echo $bill_arr["bid"] ?>"></td>
											<td><?= $user_arr["username"]; ?></td>
											<td style="width: 10%;height: 5%;"><img alt="" src="<?= $prod_arr["photo"]; ?>"></td>
											<td ><?= $prod_arr["product_name"]; ?></td>
											<td ><?= $bill_arr["quantity"]; ?></td>
											<td><?= $bill_arr["amount_per_item"]; ?></td>
											<td><?= $bill_arr["total_amount"]; ?></td>
											<td><?php
												if ($bill_arr["delivered"] == 1) {
													echo "Delivered";
												 }else{
												 	echo "Still Processing";
												 }
											?></td>
										</tr>
									<? } ?>
								</tbody>
							</table>
							<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="delivered" value="Delivered"></div>
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