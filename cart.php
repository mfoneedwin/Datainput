<?php 
    require'head-foot.php';
    require'cart-view.php';
    $headFoot = new Head();
    $cart = new CartView();

    $price1 = 10;
    $price2 = 20;
    $price3 = 30.9;
    $qty1 = 1;
    $qty2 = 4;
    $qty3 = 2;


    $total = ($price1*$qty1)+($price2*$qty2)+($price3*$qty3);

    

?>
<!--DOCTYPE html -->
<html>
<head>
    <meta charset="utf-8">
    <title>Cart | MeiyiWuhan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="bskit, bootstrap starter kit, bootstrap builder">
	<meta name="description" content="Business Startup &amp; Prototyping HTML Framework">
	
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
	<link href="css/header-2.css" rel="stylesheet">
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
	<link href="css/gallery-1.css" rel="stylesheet">
	<link href="css/gallery-2.css" rel="stylesheet">
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
	<link href="css/footer-3.css" rel="stylesheet">
	<link href="css/footer-4.css" rel="stylesheet">
	<link href="css/footer-5.css" rel="stylesheet">
	<link href="css/footer-6.css" rel="stylesheet">
	<link href="css/basic.css" rel="stylesheet">
	<link href="css/mynav.css" rel="stylesheet">

	<link href="css/dropdown.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
    
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
<style type="text/css"></style>
<script>
	function submitCheckout(){
		var pass = "true";
		elem('checkoutBtn').innerHTML='<i class="fa fa-spinner fa-spin"></i> ';
		elem('checkoutBtn').classList.add("disabled");
		var ajax = ajaxObj("POST", "checkout.php");
        ajax.onreadystatechange = function() {
        	if(ajaxReturn(ajax) == true) {
	        	response = ajax.responseText.trim();		        	
	            if(response != "success"){		            	
					// status.innerHTML = response;
				 	elem('checkoutBtn').innerHTML='Checkout<span class="glyphicon glyphicon-play"></span>';
					elem('checkoutBtn').classList.remove("disabled");
				} else {
					window.scrollTo(0,0);
					elem('welcomNote').classList.add("hidden");
					elem('cartContent').classList.add("hidden");
					elem('checkoutBtn').classList.add("hidden");
					elem('successContent').classList.remove("hidden");
				}
	        }
	    }
        ajax.send("checkout="+pass);
		
	}
</script>
</head>
<body>
    
    <div id="page" class="page">
        
   
        <?php echo $headFoot->displayHead() ; ?>
        <!--// End Copyright Bar 2 --><!-- HEADER 1 -->
	<header id="header-1">
	
		<!-- Navbar -->
		<?php echo $headFoot->displayNav() ; ?>
		<!--// End Navbar -->
		
    </header>
    <!--// END HEADER 1 --><!-- Start Content Block 3-7 -->
    <section id="content-3-7" class="content-block content-3-7">
        <div class="container">
            <div class="col-sm-12">
                <div class="underlined-title">
                    <div class="editContent">
                        <h1>Cart</h1>
                    </div>
                    <hr>
                    <div class="editContent">
						<?php if (!logged_in()){ ?>
							<h2>Please <a href="login.php">Login</a> or <a href="login.php">Register</a> to access this content!</h2>
						<?php } else { ?>
                        	<h2 id="welcomNote" >Welcome to your cart!</h2>

						<?php } ?>


                    </div>


                </div>
                <div id="successContent" class="hidden">				
					<h2><strong>Order sent successfuly</strong></h2>
					<h4>Thank you, your order has been sent to us. We will contact you for the <strong>Payment</strong> method.</h4>				
				</div>
            </div>
            
        </div>
    </section>
    <!--// END Content Block 3-7 --><!-- Start Shop 1-7 -->

    <?php if (!logged_in()){ ?>
		//
	<?php } else { ?>
	    <section id="shop-1-7" class="content-block shop-1-7">
	    	<div class="container">
				<div class="row">
				


					<div class="" id="cartContent">
					<table class="table table-striped table-hover cart-table">
						<thead>
							<tr>							
								<th></th>
								<th>PRODUCT</th>							
								<th>PRICE</th>
								<th>QUANTITY</th>
								<th>TOTAL</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php // $nbrs=(int) get_cart_number();  echo "$nbrs"; die();   ?>
							
							<?php echo $cart->displayCart(get_user_cart()) ; ?>
							
						</tbody>
					</table>	

					<hr>
					
					<div class="row">
						<div class="col-md-5 col-sm-6 col-xs-12">
							
							
							
						</div>
						<div class="col-md-5 col-md-offset-2 col-sm-6 col-xs-12">
							<h3>Cart Totals:</h3>
							<table class="table table-striped table-hover cart-table">
								<tbody>
								
									<tr class="big-total">
										<td><strong>Total</strong></td>
										<td><?php echo $cart->displayTotal(get_user_cart()) ; ?> 元</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<a type="button" class="btn btn-success"  href="index.php"><span class="glyphicon glyphicon-shopping-cart"></span>Continue Shopping</a>
						</div>

						<div class="col-md-offset-6  col-md-3">
							<button  class="btn btn-primary pull-right" onclick="submitCheckout()" id="checkoutBtn" >Checkout<span class="glyphicon glyphicon-play"></span></button>
						</div>

					</div>
					
				</div>
	    	</div>
	    </section>
	<?php } ?>
    <!--// End Shop 1-7 --><!-- Start Footer 1-1 -->
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
	<script type="text/javascript" src="js/custom.js"></script><!-- Gallery Popup -->
	
	
	<!--
	<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
	-->
	
	<!-- Theme Scripts (Do not remove) -->
	<script type="text/javascript" src="js/bskit-scripts.js"></script>

	<link href="css/scrolltop.css" rel="stylesheet">

<script src="./js/jquery.scrolltotop.js"></script>
	


</body></html>