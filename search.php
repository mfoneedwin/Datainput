<?php 
    require'head-foot.php';
    require'product-view.php';
    require'product-model.php';
  
    $product_model = new ProductModel();
    $headFoot = new Head();
    $product = new Prod();

    $searchResult = (isset($_GET['search']) && $_GET['search']!= null) ? filter_var($_GET['search'], FILTER_SANITIZE_STRING) : '';
    $nbProduct = $product_model->getSearchItems($searchResult);

	$max = count($nbProduct);
	$productPerPage = 8;
    $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 0;
    $prev = ($page==0) ? 0: $page -1;
    $maxPage = (int) ($max/$productPerPage);
    if ($max%$productPerPage == 0)
    	$maxPage = $maxPage -1;
    $next = ($page==$maxPage) ? $maxPage: $page +1;

?>


<!--DOCTYPE html -->
<html><head>
    <meta charset="utf-8">
    <title>Search Result | MeiyiWuhan</title>
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
                        <h1>Search result</h1>
                    </div>
                    <hr>
                    <div class="editContent">
                        <h2><?php echo "$max results found for \" $searchResult\"."; ?> </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// END Content Block 3-7 --><!-- Start Content Block 2-10 -->
	
	<!-- // End Content Block 2-10 --><!-- Start Shop 1-4 -->
    <section id="shop-1-4" class="content-block-nopad shop-1-4">
    	<div class="container">
    				
			<div id="shop">
				
				<div class="row">
						
					<?php 
                        echo $product->displayProduct($page, $productPerPage,$product_model->getSearchItems($searchResult),$max) ;
                     ?> 
					
					
					
				</div><!-- /.row -->
							
			</div><!-- /.shop -->
			<ul class="pager">
			    <li class="previous <?php if ($page==0) echo 'disabled'; ?> "><a href="search.php?page=<?php echo $prev; ?>"><span aria-hidden="true">&larr;</span> Previous</a></li>
			    <li class="next <?php if ($page==$maxPage || $max==0) echo 'disabled'; ?> "><a href="search.php?page=<?php echo $next; ?>">Next <span aria-hidden="true">&rarr;</span></a></li>
			  </ul>
			
    	</div><!-- /.container -->
	</section>
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