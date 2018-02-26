<?php
	include "php/includes/sessionUtils.php";

	$session = new sessionUtils();
	$session->checkSession($_SESSION["user_name"]);

	$db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_BASE) or die("Cannot connect to db..");
	$products = "SELECT * FROM products";
	$products_res = mysqli_query($db,$products);
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
						<li>
							<img src="themes/images/carousel/banner-1.jpg" alt="" />
						</li>
						<li>
							<img src="themes/images/carousel/banner-2.jpg" alt="" />
							<div class="intro">
								<h1>Mid season sale</h1>
								<p><span>Up to 50% Off</span></p>
								<p><span>On selected items online and in stores</span></p>
							</div>
						</li>
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
									<span class="pull-left"><span class="text"><span class="line"><strong>Products</strong></span></span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">
												<?php while ($products_arr = mysqli_fetch_array($products_res)) {?>
												<li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>
														<p><a href="product_detail.php?pid=<?=$products_arr["pid"];?>"><img src="<?php echo $products_arr["photo"]; ?>" alt="" /></a></p>
														<a href="product_detail.php?pid=<?=$products_arr["pid"];?>" class="title"><?= $products_arr["product_name"]?></a><br/>
														<?=$products_arr["brand"]?>
														<p class="price">₹<?=$products_arr["price"]?></p>
													</div>
												</li>
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