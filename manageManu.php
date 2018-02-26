<?php
	include 'php/includes/sessionUtils.php';

	$session = new sessionUtils();
	$session->checkAdminSession($_SESSION["admin_username"]);

	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die("Cannot Connect...");
	$select_manu = "SELECT * FROM manufacturer";
	$manu_res = mysqli_query($db,$select_manu);
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
					<div class="span12">					
						<h4 class="title"><span class="text"><strong>Manufacturers</strong></span></h4>
						<form action="php/removeManu.php" method="post">
							<fieldset>
								<table class="table table-striped shop_attributes">
									<tbody>
										<tr>
											<th>Select</th>
											<th>Name</th>
											<th>Address</th>
											<th>Email-ID</th>
											<th>Contact No.</th>
										</tr>
										<?php $i = 1; while ($manu_arr = mysqli_fetch_array($manu_res)) { ?>
										<tr>
											<td><input type="checkbox" name="check[<?php $i ?>]" value="<?php echo $manu_arr["mid"] ?>"></td>
											<td><?php echo $manu_arr["name"]; ?></td>
											<td><?php echo $manu_arr["address"]; ?></td>
											<td><?php echo $manu_arr["email"]; ?></td>
											<td><?php echo $manu_arr["phone_no"]; ?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="delete" value="Delete"></div>
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