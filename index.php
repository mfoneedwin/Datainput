<?php 
    require'head-foot.php';
    $headFoot = new Head();

     require'product-view.php';
     require'product-model.php';
     $product = new Prod();
     $product_model = new ProductModel();

    if(!empty($_POST['news-sub']) && !empty($_POST['email'])){
    	if(email_exists_in_db($_POST['email'])){

    	}else{
    	

	    	$submit_email = array(
		        'email_user' => $_POST['email']
		        );
	    	submit_email($submit_email);

	    	header('Location: index.php');
	    	exit();
    	}
    }
?>

<!--DOCTYPE html -->
<html>
<head>
    <meta charset="utf-8">
    <title>Auto spare parts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<link rel="shortcut icon" href="ico/favicon.png">
	
	<!-- Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Style Library -->
	<link href="css/style-library-1.css" rel="stylesheet">
	
	<!-- Vendor Styles -->
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.transitions.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
	
	<!-- Block Styles (Feel free to remove any that you aren't using in your final export) -->
	<link href="css/header-1.css" rel="stylesheet">
	<link href="css/header-3.css" rel="stylesheet">
	<link href="css/promo-1.css" rel="stylesheet">
	<link href="css/promo-2.css" rel="stylesheet">
	<link href="css/promo-3.css" rel="stylesheet">
	<link href="css/content1-1.css" rel="stylesheet">
	<link href="css/content1-2.css" rel="stylesheet">
	<link href="css/content1-3.css" rel="stylesheet">
	<link href="css/content1-4.css" rel="stylesheet">
	<link href="css/content1-5.css" rel="stylesheet">
	<link href="css/content1-6.css" rel="stylesheet">
	<link href="css/content1-7.css" rel="stylesheet">
	<link href="css/content1-8.css" rel="stylesheet">
	<link href="css/content1-9.css" rel="stylesheet">
	<link href="css/content2-1.css" rel="stylesheet">
	<link href="css/content2-2.css" rel="stylesheet">
	<link href="css/content2-3.css" rel="stylesheet">
	<link href="css/content2-4.css" rel="stylesheet">
	<link href="css/content2-5.css" rel="stylesheet">
	<link href="css/content2-6.css" rel="stylesheet">
	<link href="css/content2-7.css" rel="stylesheet">
	<link href="css/content2-8.css" rel="stylesheet">
	<link href="css/content2-9.css" rel="stylesheet">
	<link href="css/content2-10.css" rel="stylesheet">
	<link href="css/content3-1.css" rel="stylesheet">
	<link href="css/content3-2.css" rel="stylesheet">
	<link href="css/content3-3.css" rel="stylesheet">
	<link href="css/content3-4.css" rel="stylesheet">
	<link href="css/content3-5.css" rel="stylesheet">
	<link href="css/content3-6.css" rel="stylesheet">
	<link href="css/content3-7.css" rel="stylesheet">
	<link href="css/content3-8.css" rel="stylesheet">
	<link href="css/content3-9.css" rel="stylesheet">
	<link href="css/content3-10.css" rel="stylesheet">
	<link href="css/content3-11.css" rel="stylesheet">
	
	<link href="css/team-1.css" rel="stylesheet">
	<link href="css/team-2.css" rel="stylesheet">
	<link href="css/pricing-tables-1.css" rel="stylesheet">
	<link href="css/pricing-tables-2.css" rel="stylesheet">
	<link href="css/contact-1.css" rel="stylesheet">
	<link href="css/contact-2.css" rel="stylesheet">
	<link href="css/contact-3.css" rel="stylesheet">
	<link href="css/blog-1.css" rel="stylesheet">
	<link href="css/shop-1.css" rel="stylesheet">
	<link href="css/shop-2.css" rel="stylesheet">
	<link href="css/shop-3.css" rel="stylesheet">
	<link href="css/shop-4.css" rel="stylesheet">
	<link href="css/shop-5.css" rel="stylesheet">
	<link href="css/shop-6.css" rel="stylesheet">
	<link href="css/shop-7.css" rel="stylesheet">
	<link href="css/footer-1.css" rel="stylesheet">
	<link href="css/footer-2.css" rel="stylesheet">
	<!-- <link href="css/footer-3.css" rel="stylesheet"> -->
	<!-- <link href="css/footer-4.css" rel="stylesheet"> -->
	<link href="css/footer-5.css" rel="stylesheet">
	<link href="css/footer-6.css" rel="stylesheet">
	<link href="css/slidestyle.css" rel="stylesheet">
	<!-- <link href="css/basic.css" rel="stylesheet"> -->
	

	<link href="css/scrolltop.css" rel="stylesheet">
	<link href="css/dropdown.css" rel="stylesheet">
	
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
<style type="text/css"></style></head>
<body>
    
    <div id="page" class="page">
        
    <!-- HEADER 1 -->
	
    <!--// END HEADER 1 --><!-- Start Copyright Bar 2 -->
        <?php echo $headFoot->displayHead() ; ?>
        <!--// End Copyright Bar 2 --><!-- HEADER 1 -->
	<header id="header-1">
	
		<!-- Navbar -->
		
		<!--// End Navbar -->

		<section class="hero">

			<?php echo $headFoot->displayNav() ; ?>



			<div class="container">
				

				<div id="carousel-id" class="carousel slide hidden-xs" data-ride="carousel">
				    <ol class="carousel-indicators">
				        <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
				        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
				        <li data-target="#carousel-id" data-slide-to="2" class=""></li>
				    </ol>
				    <div class="carousel-inner">
				        <div class="item active">
				            <img class="img-responsive" alt="First slide" src="./images/blank.png">
				            <div class="container">
				                <div class="carousel-caption">
				                    <h1>MeiyiWuhan</h1>
				                    <p>Shop freely with our big discount products Wow Knits! Savings up to 40%*</p>
				                    <p><a class="btn btn-lg btn-primary" href="login.php" role="button">Sign up today</a></p>

				                </div>
				            </div>
				        </div>
				        <div class="item">
				           <img class="img-responsive" alt="First slide" src="./images/blank.png">
				            <div class="container">
				                <div class="carousel-caption">
				                    <h1>Designers.</h1>
				                    <p>And Their Fabulous Brands.</p>
				                    <p><a class="btn btn-lg btn-primary" href="oder.php" role="button">How to oder</a></p>
				                </div>
				            </div>
				        </div>
				        <div class="item ">
				            <img class="img-responsive" alt="First slide" src="./images/blank.png">
				            <div class="container">
				                <div class="carousel-caption">
				                    <h1>There's nothing more beautiful than a great deal! Get big savings.</h1>
				                    <p>Check out MeiyiWuhan discount and start saving now! If you don’t see an offer you like please check back soon as we do provide 50 percent off and free shipping often</p>
				                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
				                </div>
				            </div>
				        </div>
				    </div>
				    
				</div>





			</div>
		</section>

		
    </header>

	

    <!--// END HEADER 1 --><!-- Start Content Block 1-1 -->
	
    <section id="shop-1-3" class="content-block shop-1-3">
    	<div class="container">
    	
			<ul class="nav nav-tabs text-center" role="tablist" id="myTab">
				<li class="active"><a href="#tab1" role="tab" data-toggle="tab">New Arrivals</a></li>
				<li class=""><a href="#tab2" role="tab" data-toggle="tab">Special Promotions</a></li>
				
			</ul>
			
			<div id="tabbed-shop" class="tab-content">
				
				<div class="tab-pane fade active in" id="tab1">
					<div class="row">
						
						
						<?php 
							 echo $product->displayIndexProduct($product_model->getNewProducts()) ;

						?>
						
					</div><!-- /.row -->
										
				</div><!-- /#tab1 -->
				
				<div class="tab-pane fade" id="tab2">
					<div class="row">
						
						<?php 
							echo $product->displayIndexProduct($product_model->getOldProducts()) ;

						?>
						
					</div><!-- /.row -->
				</div><!-- /#tab2 -->
				
				
				
			</div><!-- /.tab-content -->
			
    	</div><!-- /.container -->
	</section>
    <!--// End Shop 1-3 --><!-- Start Shop 1-1 -->
	<section id="shop-1-1" class="content-block shop-1-1">
		<div class="container">
			<div class="row">
			
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="row">
						<div class="col-xs-2">
							<span class="fa fa-tag"></span>
						</div>
						<div class="col-xs-10">
							<div class="editContent">
								<h4>Genuine Brands</h4>
							</div>
							<div class="editContent">
								<p>Rest assured we only sell 100% genuine brands.</p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="row">
						<div class="col-xs-2">
							<span class="fa fa-truck"></span>
						</div>
						<div class="col-xs-10">
							<div class="editContent">
								<h4>Delivery</h4>
							</div>
							<div class="editContent">
								<p>FREE delivery on orders over 500 元 anywhere in CHINA.</p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="row">
						<div class="col-xs-2">
							<span class="fa fa-lock"></span>
						</div>
						<div class="col-xs-10">
							<div class="editContent">
								<h4>Shop Secure</h4>
							</div>
							<div class="editContent">
								<p>Piece of mind with our secure shopping experience.</p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="row">
						<div class="col-xs-2">
							<span class="fa fa-history"></span>
						</div>
						<div class="col-xs-10">
							<div class="editContent">
								<h4>30 Day Returns</h4>
							</div>
							<div class="editContent">
								<p>No need to worry with our 30 day returns policy.</p>
							</div>
						</div>
					</div>
				</div>
			
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>
    <!--// END Shop 1-1 --><!-- Start Content Block 2-3 -->
	<section class="content-block content-2-3 bg-deepocean" style="background-color: gray !important;">
		<div class="container">
			<form action="index.php" method="post" role="form"><div class="col-sm-7 pull-left">
							<div class="editContent">
								<h2>Sign-up to receive our newsletter</h2>
							</div>
						</div>
						<div class="form-group"><div class="col-sm-4 pull-right">
													<div class="input-group">
														<input type="email" class="form-control" id="email" name="email" placeholder="Email address">
														<span class="input-group-btn">
															<button class="btn btn-primary" type="submit" id="news-sub" name="news-sub" value="send">Send</button>
																													</span>
													</div><!-- /.input-group -->
													
												</div></div></form>
		</div><!-- /.container -->
	</section>
	<!--// END Content Block 2-3 --><!-- Start Footer 1-1 -->
	<?php echo $headFoot->displayFooter() ; ?>
	<!--// END Footer Copyright Bar --></div><!-- /#page -->


    <!-- Scripts at the end... you know the score! -->
	<!-- Core Scripts (Do not remove) -->
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>			
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-hover-dropdown.min.js"></script>
	
	<!-- Vendor Scripts (Feel free to remove any that you aren't using in your final export) -->
	<script type="text/javascript" src="js/modernizr.custom.js"></script>
	<script type="text/javascript" src="js/headroom.js"></script><!-- Header 1 -->
	<script type="text/javascript" src="js/jquery.headroom.js"></script><!-- Header 1 -->
	<script type="text/javascript" src="js/count.down.min.js"></script><!-- Promo 2 Countdown -->
	<script type="text/javascript" src="js/owl.carousel.min.js"></script><!-- Owl Carousel -->
	<script type="text/javascript" src="js/jquery.counterup.min.js"></script><!-- Content 2-7 Counter -->
	<script type="text/javascript" src="js/waypoints.min.js"></script><!-- Content 2-7 Counter -->
	<script type="text/javascript" src="js/jquery.isotope.min.js"></script><!-- Gallery Filter -->
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script><!-- Gallery Popup -->
	<script type="text/javascript" src="js/sendmail.js"></script><!-- Contact Form -->
	<script type="text/javascript" src="js/contact-form.php"></script><!-- Contact Form -->


	
	<!--
	<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
	-->
	
	<!-- Theme Scripts (Do not remove) -->
	<script type="text/javascript" src="js/bskit-scripts.js"></script>
	
	<script type="text/javascript" >

		var isIE = /*@cc_on!@*/false || !!document.documentMode;   // At least IE6

		// var output = 'Detecting browsers by ducktyping:<hr>';
		var output = isIE;
		// document.body.innerHTML = output;
		if (output)
			alert("Please choose another browser else than \"Internet Explorer\" for more experience. Thank you");

	</script><!-- IE DETECTION -->
	


	<script src="./js/jquery.scrolltotop.js"></script>
	
    
    
	


</body></html>