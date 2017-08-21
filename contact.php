<?php 
    require'head-foot.php';
    $headFoot = new Head();
?>
<!--DOCTYPE html -->
<html><head>
    <meta charset="utf-8">
    <title>Contact | MeiyiWuhan</title>
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
    
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
<style type="text/css"></style>

<script>
	function sendMsg(){
		var status = elem('status');
		var name = elem('name').value;
		var email = elem('email').value;
		var phone = elem('phone').value;
		var comments = elem('comments').value;
		var response = "";

		// status.innerHTML = comments;
		// exit();
		
		elem('contactsubmit').innerHTML='<i class="fa fa-spinner fa-spin"></i> ';
		elem('contactsubmit').classList.add("disabled");
		// elem('recoBtn').classList.remove("btn-block");
		var ajax = ajaxObj("POST", "contact-script.php");
        ajax.onreadystatechange = function() {
        	if(ajaxReturn(ajax) == true) {
	        	response = ajax.responseText.trim();		        	
	            if(response != "success"){		            	
					status.innerHTML = response;
				 	elem('contactsubmit').innerHTML='Send';
					elem('contactsubmit').classList.remove("disabled");
				} else {
					elem('contactform').innerHTML = "<fieldset><div id='success_page'><h2>Email Sent Successfully.</h2><p>Thank you <strong>"+name+"</strong>, your message has been sent to us.</p></div></fieldset>";
				}
	        }
	    }
        ajax.send("name="+name+"&email="+email+"&phone="+phone+"&comments="+comments);
		
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
    <!--// END HEADER 1 --><!-- Start Contact 1 -->
    <section class="content-block contact-1">
		<div class="container text-center">
			
			<div class="col-sm-10 col-sm-offset-1">
				
				<div class="underlined-title">
					<div class="editContent">
		        		<h1>Contact us</h1>
					</div>
		        	<hr>
		        	<div class="editContent">
		        		<h2>Feel free to ask as many details!</h2>
					</div>
	        	</div>
				
				<div class="editContent">
					<p>Contact us by sending an email and any more information you need from us</p>
				</div>
				<div class="editContent">
					<ul class="contact-info">
						<li><span class="fa fa-map-marker"></span>Address: D Building, future city,Jiedaokou whuchang Hubie China. CHINA</li>
						<li><span class="fa fa-phone"></span>Phone:+8613 545 877 069</li>
						<li><span class="fa fa-envelope"></span><a href="contact.php">Email: mygjwhsl@126.com /meiyiwuhan@outlook.com</a> </li>
					</ul>
				</div>
				
				<div id="contact" class="form-container">
                    <span style="color:red; font-weight: bold;" id="status"></span> 
                  

					<form action="#" name="contactform" id="contactform" onsubmit="return false">
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
                                    <input name="name" id="name" type="text" value="" placeholder="Name" class="form-control" onfocus="emptyElement('status')" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
                                    <input name="email" id="email" type="email" value="" placeholder="Email" class="form-control" onfocus="emptyElement('status')" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
                                    <input name="phone" id="phone" type="text" value="" placeholder="Phone" class="form-control" onfocus="emptyElement('status')" required>
								</div>
							</div>
						</div><!-- /.row -->
						<div class="form-group">
                            <textarea name="comments" id="comments" class="form-control" rows="3" placeholder="Message" onfocus="emptyElement('status')"  required></textarea>
							<div class="editContent">
								<p class="small text-muted"><span class="guardsman">* All fields are required.</span> Once we receive your message we will respond as soon as possible.</p>
							</div>
						</div>
						<div class="form-group">
                            <button class="btn btn-primary" id="contactsubmit" onclick="sendMsg()" >Send</button>
						</div>
					</form>
				</div><!-- /.form-container -->
			
			</div><!-- /.col-sm-10 -->
				
		</div><!-- /.container -->
	</section><!-- /.content-block -->
	<!--// END Contact 1 --><!-- Start Footer 1-1 -->
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
	<script type="text/javascript" src="js/custom.js"></script><!-- Ajax -->
	<!-- // <script type="text/javascript" src="js/sendmail.js"></script><! Contact Form --> 
	<!-- // <script type="text/javascript" src="js/contact-form.php"></script><! Contact Form --> 
	
	<!--
	<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
	-->
	
	<!-- Theme Scripts (Do not remove) -->
	<script type="text/javascript" src="js/bskit-scripts.js"></script>

	<link href="css/scrolltop.css" rel="stylesheet">

<script src="./js/jquery.scrolltotop.js"></script>
	


</body></html>