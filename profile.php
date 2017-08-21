<?php 
    require'head-foot.php';
    require'product-view.php';
    require'product-model.php';
  
  
    $product_model = new ProductModel();
    $headFoot = new Head();
    $product = new Prod();
    if(!logged_in()){
	header('Location: index.php');
	exit();}

	include 'login-model.php';

	if( !empty($_POST['change-submit']) && empty($errors) && empty($errorsAllCh) && empty($erroOldPass) && empty($errorNewPassLength) && empty($errorDupl) ){
		change_password($session_user_id, $_POST['new_pass'] );
		$changeSuccess = 'Your password have been successfuly changed.';

	}elseif( !empty($errors) || !empty($errorsAllCh) || !empty($erroOldPass) || !empty($errorNewPassLength) || !empty($errorDupl) ){
		$chgerr='Password update error. Please try again';

	}

	if( !empty($_POST['update-submit']) && empty($errors) && empty($errorsAllUp) && empty($errorsMail) && empty($errorsName)  ){
		
		$update_data = array(
	        'name' => $_POST['username'],
	        'address' => $_POST['address'],
	        'city' => $_POST['city'],
	        'phone' => $_POST['phone'],
	        'email' => $_POST['email']
	        );
        update_user($update_data);

		$updateSuccess = 'Your informations have been successfuly changed.';

	}elseif( !empty($errorsAllUp) || !empty($errorsMail) || !empty($errorsName)  ){
		 $uperr='Informations update error. Please try again';

	}

       
?>
<!--DOCTYPE html -->
<html><head>
    <meta charset="utf-8">
    <title>Profile | MeiyiWuhan</title>
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
	<link href="css/mynav.css" rel="stylesheet">

    <link href="css/dropdown.css" rel="stylesheet">
    
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
<style type="text/css"></style></head>
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
                        <h1>Profile</h1>
                    </div>
                    <hr>
                    <div class="editContent">
                        <h2>Welcome, <?php echo $user_data['name']; ?> </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="userInfo" class="content-block content-3-7">
    	<div class="container">
    		<div class="row">
    		<?php  if( $errorsAllCh || $erroOldPass || $errorNewPassLength || $errorDupl ){ ?>


				<!-- error output -->
	    		<div class="col-sm-offset-3 col-sm-7">
    			<h3 style="color: red; font-weight: bold;"><?php echo $chgerr; ?> </h3>
    			</div>
    		<?php } elseif ($changeSuccess) { ?>
    			<div class="col-sm-offset-3 col-sm-7">
    			<h4 style="color: green; font-weight: bold;"><?php echo $changeSuccess; ?> </h4>
    			</div>
    		<?php } elseif ($updateSuccess) { ?>
    			<div class="col-sm-offset-3 col-sm-7">
    			<h4 style="color: green; font-weight: bold;"><?php echo $updateSuccess; ?> </h4>
    			</div>
    		<?php } elseif ($uperr) { ?>
    			<div class="col-sm-offset-3 col-sm-7">
    			<h4 style="color: red; font-weight: bold;"><?php echo $uperr; ?> </h4>
    			</div>
    			
    		<?php } ?>

    		

    		<div class="col-sm-offset-2 col-sm-8"><div class="list-group">
    		    						  <a href="#" class="list-group-item active" style="font-weight: bold; font-size: 20px;">
    		    						    User Informations
    		    						  </a>
    		    						  <a href="#" class="list-group-item">
    		    						  	<div class="row">
	    		    						  	<div class="col-sm-2" style="font-weight: bold;">
	    		    						  		Username: 
	    		    						  	</div>
	    		    						  	<div class="col-sm-2">
	    		    						  		<?php echo $user_data['name']; ?>
	    		    						  	</div>
	    		    						  </div>

    		    						  </a>
    		    						  <a href="#" class="list-group-item">
	    		    						  <div class="row">
	    		    						  	<div class="col-sm-2" style="font-weight: bold;">
	    		    						  		Address: 
	    		    						  	</div>
	    		    						  	<div class="col-sm-2">
	    		    						  		<?php echo $user_data['address']; ?>
	    		    						  	</div>
	    		    						  </div>
    		    						  </a>
    		    						  <a href="#" class="list-group-item">
    		    						  <div class="row">
	    		    						  	<div class="col-sm-2" style="font-weight: bold;">
	    		    						  		City: 
	    		    						  	</div>
	    		    						  	<div class="col-sm-2">
	    		    						  		<?php echo $user_data['city']; ?>
	    		    						  	</div>
	    		    						  </div>
    		    						  </a>
    		    						  <a href="#" class="list-group-item">
    		    						  <div class="row">
	    		    						  	<div class="col-sm-2" style="font-weight: bold;">
	    		    						  		Telephone: 
	    		    						  	</div>
	    		    						  	<div class="col-sm-2">
	    		    						  		<?php echo $user_data['phone']; ?>
	    		    						  	</div>
	    		    						  </div>

    		    						  </a>
    		    						  <a href="#" class="list-group-item">
    		    						  	<div class="row">
	    		    						  	<div class="col-sm-2" style="font-weight: bold;">
	    		    						  		Email: 
	    		    						  	</div>
	    		    						  	<div class="col-sm-2">
	    		    						  		<?php echo $user_data['email']; ?>
	    		    						  	</div>
	    		    						  </div>

    		    						  </a>
    		    					</div></div>
							<div class="col-sm-offset-2 col-sm-8">
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Update informations</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2">Change Password</button>

							</div>
    		    					</div>
    	</div>

    </section>


	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Informations</h4>
      </div>
      <div class="modal-body">

      <form class="form-horizontal" id="update-form" action="profile.php" method="post" role="form">
		  <div class="form-group">
		    <label for="username" class="col-sm-4 control-label">Username: </label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $user_data['name']; ?>">
		      <?php if($errorsName) echo "<p style='color: red;'>",$errorsName; ?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="address" class="col-sm-4 control-label">Address: </label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $user_data['address']; ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="city" class="col-sm-4 control-label">City: </label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $user_data['city']; ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="phone" class="col-sm-4 control-label">Telephone: </label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="phone" name="phone" placeholder="Telephone" value="<?php echo $user_data['phone']; ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="email" class="col-sm-4 control-label">Email: </label>
		    <div class="col-sm-8">
		      <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user_data['email']; ?>">
		      <?php if($errorsMail) echo "<p style='color: red;'>",$errorsMail; ?>
		    </div>
		  </div>
		 
		
		  <?php  if( $errorsAllUp ){ ?>
				  <div class="col-sm-offset-2 col-sm-10">
				  		<p style="color: red;"> <?php echo $errorsAllUp;?> </p>
				  </div>
			<?php } ?>
		  
		  
	
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		       <button type="submit" name="update-submit" id="update-submit"  class="btn btn-success" value="Update">Update</button>
		    </div>
		  </div>
</form>


      </div>
      
    </div>
  </div>
</div>


<!-- Modal2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <div class="modal-body">

      <form class="form-horizontal" id="change-form" action="profile.php" method="post" role="form">
		  
		  <div class="form-group">
		    <label for="old_pass" class="col-sm-4 control-label">Old Password: </label>
		    <div class="col-sm-8">
		      <input type="password" class="form-control" name="old_pass" id="old_pass" placeholder="Old Password" >
		      <?php if($erroOldPass) echo "<p style='color: red;'>",$erroOldPass; ?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="new_pass" class="col-sm-4 control-label">New Password: </label>
		    <div class="col-sm-8">
		      <input type="password" class="form-control" name="new_pass"    id="new_pass" placeholder="New Password" >
		      <?php if($errorNewPassLength) echo "<p style='color: red;'>",$errorNewPassLength; ?>
		      <?php if($errorDupl) echo "<p style='color: red;'>",$errorDupl; ?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="conf_new_pass" class="col-sm-4 control-label">Confirm New Password: </label>
		    <div class="col-sm-8">
		      <input type="password" class="form-control" name="conf_new_pass"  id="conf_new_pass" placeholder="Confirm New Password" >
		    </div>
		  </div>
			<?php  if( $errorsAllCh ){ ?>
				  <div class="col-sm-offset-2 col-sm-10">
				  		<p style="color: red;"> <?php echo $errorsAllCh;?> </p>
				  </div>
			<?php } ?>
		  
	
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		       <button type="submit" name="change-submit" id="change-submit"  class="btn btn-success" value="change">Change</button>
		    </div>
		  </div>
</form>


      </div>
      
    </div>
  </div>
</div>
    <!--// END Content Block 3-7 --><!-- Start Content Block 2-10 -->
	
	<!-- // End Content Block 2-10 --><!-- Start Shop 1-4 -->
    
    <!--// End Shop 1-4 --><!-- Start Footer 1-1 -->
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

    <link href="css/scrolltop.css" rel="stylesheet">

<script src="./js/jquery.scrolltotop.js"></script>
	


</body></html>