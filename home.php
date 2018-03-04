<?php
	include "php/includes/sessionUtils.php";

	$session = new sessionUtils();
	$session->checkSession($_SESSION["user_name"]);

	$db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_BASE) or die("Cannot connect to db..");
	$jute_qry = "SELECT * FROM products WHERE brand = 'jute'";
	$jute_res = mysqli_query($db,$jute_qry);
	$terracota_qry = "SELECT * FROM products WHERE brand = 'terracota'";
	$terracota_res = mysqli_query($db,$terracota_qry);
	$pickels_qry = "SELECT * FROM products WHERE brand = 'pickels'";
	$pickels_res = mysqli_query($db,$pickels_qry);
	$cooking_qry = "SELECT * FROM products WHERE brand = 'cooking paste'";
	$cooking_res = mysqli_query($db,$cooking_qry);
	$millets_qry = "SELECT * FROM products WHERE brand = 'millets'";
	$millets_res = mysqli_query($db,$millets_qry);
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
							<li><a href="home.php">Home</a></li>
							<li><a href="cart.php">Your Order</a></li>
							<li><a href="php/logout.php">Logout</a></li>
							<li>Hi! <?php echo $_SESSION["user_name"]; ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						<li><img src="themes/images/carousel/001.jpg" alt="" /></li>
						<li><img src="themes/images/carousel/002.jpg" alt="" /></li>
						<li><img src="themes/images/carousel/003.jpg" alt="" /></li>
						<li><img src="themes/images/carousel/004.jpg" alt="" /></li>
						<li><img src="themes/images/carousel/005.jpg" alt="" /></li>
						<li><img src="themes/images/carousel/006.jpg" alt="" /></li>
						<li><img src="themes/images/carousel/007.jpg" alt="" /></li>
						<li><img src="themes/images/carousel/008.jpg" alt="" /></li>
					</ul>
				</div>			
			</section>
			<section class="header_text">
				<div class="row feature_box">						
					<div class="span4">
						<div class="service">
							<div class="responsive">	
								<img src="themes/images/feature_img_2.png" alt="" />
								<h4>MODERN <strong>DESIGN</strong></h4>		
							</div>
						</div>
					</div>
					<div class="span4">	
						<div class="service">
							<div class="customize">			
								<img src="themes/images/feature_img_1.png" alt="" />
								<h4>FREE <strong>SHIPPING</strong></h4>
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="service">
							<div class="support">	
								<img src="themes/images/feature_img_3.png" alt="" />
								<h4>24/7 LIVE <strong>SUPPORT</strong></h4>
							</div>
						</div>
					</div>	
				</div>		
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line"><strong>JUTE</strong> PRODUCTS</span></span></span>
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">
												<?php while ($jute_arr = mysqli_fetch_array($jute_res)) { ?>
													<?php if ($jute_arr["brand"] == "jute" ) { ?>
														<li class="span3">
															<div class="product-box">
																<span class="sale_tag"></span>
																<p><a href="product_detail.php?pid=<?=$jute_arr["pid"];?>"><img src="<?php echo $jute_arr["photo"]; ?>" alt="" /></a></p>
																<a href="product_detail.php?pid=<?=$jute_arr["pid"];?>" class="title"><?= $jute_arr["product_name"]?></a><br/>
																<?=$jute_arr["brand"]?>
																<p class="price">₹<?=$jute_arr["price"]?></p>
															</div>
														</li>					
													<?php } ?>
												<?php } ?>
											</ul>
										</div>
									</div>							
								</div>
							</div>						
						</div>
						<br/>
					</div>				
				</div>
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line"><strong>terracota</strong> PRODUCTS</span></span></span>
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">
												<?php while ($terracota_arr = mysqli_fetch_array($terracota_res)) { ?>
													<?php if ($terracota_arr["brand"] == "terracota" ) { ?>
														<li class="span3">
															<div class="product-box">
																<span class="sale_tag"></span>
																<p><a href="product_detail.php?pid=<?=$terracota_arr["pid"];?>"><img src="<?php echo $terracota_arr["photo"]; ?>" alt="" /></a></p>
																<a href="product_detail.php?pid=<?=$terracota_arr["pid"];?>" class="title"><?= $terracota_arr["product_name"]?></a><br/>
																<?=$terracota_arr["brand"]?>
																<p class="price">₹<?=$terracota_arr["price"]?></p>
															</div>
														</li>					
													<?php } ?>
												<?php } ?>
											</ul>
										</div>
									</div>							
								</div>
							</div>						
						</div>
						<br/>
					</div>				
				</div>
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line"><strong>pickels</strong> PRODUCTS</span></span></span>
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">
												<?php while ($pickels_arr = mysqli_fetch_array($pickels_res)) { ?>
													<?php if ($pickels_arr["brand"] == "pickels" ) { ?>
														<li class="span3">
															<div class="product-box">
																<span class="sale_tag"></span>
																<p><a href="product_detail.php?pid=<?=$pickels_arr["pid"];?>"><img src="<?php echo $pickels_arr["photo"]; ?>" alt="" /></a></p>
																<a href="product_detail.php?pid=<?=$pickels_arr["pid"];?>" class="title"><?= $pickels_arr["product_name"]?></a><br/>
																<?=$pickels_arr["brand"]?>
																<p class="price">₹<?=$pickels_arr["price"]?></p>
															</div>
														</li>					
													<?php } ?>
												<?php } ?>
											</ul>
										</div>
									</div>							
								</div>
							</div>						
						</div>
						<br/>
					</div>				
				</div>
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line"><strong>cooking paste</strong> PRODUCTS</span></span></span>
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">
												<?php while ($paste_arr = mysqli_fetch_array($cooking_res)) { ?>
													<?php if ($paste_arr["brand"] == "cooking paste" ) { ?>
														<li class="span3">
															<div class="product-box">
																<span class="sale_tag"></span>
																<p><a href="product_detail.php?pid=<?=$paste_arr["pid"];?>"><img src="<?php echo $paste_arr["photo"]; ?>" alt="" /></a></p>
																<a href="product_detail.php?pid=<?=$paste_arr["pid"];?>" class="title"><?= $paste_arr["product_name"]?></a><br/>
																<?=$paste_arr["brand"]?>
																<p class="price">₹<?=$paste_arr["price"]?></p>
															</div>
														</li>					
													<?php } ?>
												<?php } ?>
											</ul>
										</div>
									</div>							
								</div>
							</div>						
						</div>
						<br/>
					</div>				
				</div>
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line"><strong>millets</strong> PRODUCTS</span></span></span>
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">
												<?php while ($millets_arr = mysqli_fetch_array($millets_res)) { ?>
													<?php if ($millets_arr["brand"] == "millets" ) { ?>
														<li class="span3">
															<div class="product-box">
																<span class="sale_tag"></span>
																<p><a href="product_detail.php?pid=<?=$millets_arr["pid"];?>"><img src="<?php echo $millets_arr["photo"]; ?>" alt="" /></a></p>
																<a href="product_detail.php?pid=<?=$millets_arr["pid"];?>" class="title"><?= $millets_arr["product_name"]?></a><br/>
																<?=$millets_arr["brand"]?>
																<p class="price">₹<?=$millets_arr["price"]?></p>
															</div>
														</li>					
													<?php } ?>
												<?php } ?>
											</ul>
										</div>
									</div>							
								</div>
							</div>						
						</div>
						<br/>
					</div>				
				</div>
			</section>
			<section id="copyright">
				<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script src="themes/js/jquery.flexslider-min.js"></script>
		<!-- <script type="text/javascript" src="js/custom.js"></script> -->
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>