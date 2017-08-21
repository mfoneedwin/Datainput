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
if(!$user_data['admin']==1){
	header('Location: index.php');
	exit();
}
$sql_msg = "SELECT COUNT(`msg_id`) FROM `messages` WHERE `seen`=0";
$nbr_msg = mysql_result(mysql_query($sql_msg), 0);
$messages = get_messages();

$query = mysql_query("SELECT * , COUNT(*) AS `count` FROM `checkout` GROUP BY `time` ORDER BY `filter` DESC");
$nbUSR = array();
while ($row = mysql_fetch_assoc($query)) {
	$nbUSR [] = $row;		
}	


$query = mysql_query("SELECT COUNT(*) AS `count` FROM `checkout` WHERE `seen`=0 GROUP BY `filter` ");
$nbUSR2 = array();
while ($row = mysql_fetch_assoc($query)) {
	$nbUSR2 [] = $row;		
}	
$nbrUnseenOrder = count($nbUSR2);

$nbruser = mysql_result(mysql_query("SELECT COUNT(*) FROM `members` WHERE `admin`=0"),0);
$membs = get_members();


if(!empty($_POST['addProd-submit'])){
	$required_fields = array('category','title', 'description','price',);
	foreach($_POST as $key=>$value){
		if(empty($value) && in_array($key, $required_fields) === true){
			$errorAddAll = 'The fields with * are required';
			break 1;
			echo "fill area";die();

		}
	}
}


if(!empty($_POST['addProd-submit']) && empty($errorAddAll)){	
	if(isset($_FILES['image1']) || isset($_FILES['image2'])){
		if(empty($_FILES['image1']['name']) ){			
				$errorIm1 = 'Please choose a file';							
		}else{		
		
			$allowed = array('jpg', 'jpeg', 'png');
			$file_name = $_FILES['image1']['name'];
			$file_name2 = $_FILES['image2']['name'];
			$file_name3 = $_FILES['image3']['name'];
			$file_name4 = $_FILES['image4']['name'];
			$file_name5 = $_FILES['image5']['name'];
			$file_extn = strtolower(end(explode('.', $file_name)));
			$file_extn2 = strtolower(end(explode('.', $file_name2)));
			$file_extn3 = strtolower(end(explode('.', $file_name3)));
			$file_extn4 = strtolower(end(explode('.', $file_name4)));
			$file_extn5 = strtolower(end(explode('.', $file_name5)));
			$file_extn11 = end(explode('.', $file_name));
			$file_extn21 = end(explode('.', $file_name2));
			$file_extn33 = end(explode('.', $file_name3));
			$file_extn44 = end(explode('.', $file_name4));
			$file_extn55 = end(explode('.', $file_name5));
			$file_temp= $_FILES['image1']['tmp_name'];
			$file_temp2= $_FILES['image2']['tmp_name'];
			$file_temp3= $_FILES['image3']['tmp_name'];
			$file_temp4= $_FILES['image4']['tmp_name'];
			$file_temp5= $_FILES['image5']['tmp_name'];
			$up1 = ''; $up2 = ''; $up3 = ''; $up4 = ''; $up5 = '';
			if(in_array($file_extn2, $allowed)){
				$up2 = upl_img($file_temp2,$file_extn21);				
			}
			if(in_array($file_extn3, $allowed)){
				$up3 = upl_img($file_temp3,$file_extn33);								
			}
			if(in_array($file_extn4, $allowed)){
				$up4 = upl_img($file_temp4,$file_extn44);								
			}
			if(in_array($file_extn5, $allowed)){
				$up5 = upl_img($file_temp5,$file_extn55);								
			}
			if(in_array($file_extn, $allowed)){
				$up1 = upl_img($file_temp,$file_extn11);
				$products = array(
				        'title' => $_POST['title'],
				        'description' => $_POST['description'],
				        'price' => $_POST['price'],
				        'old_price' => $_POST['old_price'],
				        'special' => $_POST['special'],
				        'image1' => $_POST['image1'],
				        'image2' => $_POST['image2'],
				        'image3' => $_POST['image3'],
				        'image4' => $_POST['image4'],
				        'image5' => $_POST['image5'],
				        'category' => $_POST['category']
				        );
				upl_img_db($products,$up1,$up2,$up3,$up4,$up5);
				
				
				
			}else{
				$errortype = 'Incorrect file type. Please use: .jpg .jpeg or .png files only.';				
			}
		}
	}}



?>

<!--DOCTYPE html -->
<html>
<head>
    <meta charset="utf-8">
    <title>Admin | MeiyiWuhan</title>
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
    <link href="css/custom.css" rel="stylesheet">
    
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
<style type="text/css"></style>
<script>
	function openMsg(x){
		var msgBox = "msgID"+x;
		var nbrMsg = elem('nbMSG').innerHTML;
		var actuClass = elem(msgBox).className;
		var response = "";
		
		if(actuClass=="msgUnread"){
			var ajax = ajaxObj("POST", "contact-script.php");
	        ajax.onreadystatechange = function() {
	        	if(ajaxReturn(ajax) == true) {
		        	response = ajax.responseText.trim();		        	
		            if(response == "success"){		            	
						elem('nbMSG').innerHTML = nbrMsg - 1;
						elem(msgBox).classList.remove("msgUnread");
						elem(msgBox).classList.add("msgRead");
					} 
		        }
		    }
	        ajax.send("readMessage="+x);			
		}		
	}
	function openChk(x,time){
		var msgBox = "chkID"+x;
		var nbrMsg = elem('nbPURCH').innerHTML;
		var actuClass = elem(msgBox).className;
		var response = "";
		
		if(actuClass=="msgUnread"){
			var ajax = ajaxObj("POST", "checkout.php");
	        ajax.onreadystatechange = function() {
	        	if(ajaxReturn(ajax) == true) {
		        	response = ajax.responseText.trim();		        	
		            if(response == "success"){		            	
						elem('nbPURCH').innerHTML = nbrMsg - 1;
						elem(msgBox).classList.remove("msgUnread");
						elem(msgBox).classList.add("msgRead");
					} 
		        }
		    }
	        ajax.send("openCHK="+time);			
		}		
	}
	function delUser(x,uid){
		var user = "userDetail"+x;
		var nbruser = elem('nbUSER').innerHTML;
		var response = "";
		var confirmation = confirm("Are you sure?");
		if (confirmation==true){
			var ajax = ajaxObj("POST", "checkout.php");
	        ajax.onreadystatechange = function() {
	        	if(ajaxReturn(ajax) == true) {
		        	response = ajax.responseText.trim();		        	
		            if(response == "success"){		            	
						elem('nbUSER').innerHTML = nbruser - 1;						
						elem(user).classList.add("hidden");
					} 
		        }
		    }
	        ajax.send("delUSER="+uid);	
			
		}
		
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
                        <h1>Admin Page</h1>
                    </div>
                    <hr>
                    <div class="editContent">
						<?php if($errorNews){?>
                        	<h3 style="color: red; font-weight: bold;"> <?php echo $errorNews;?> </h3>
                        <?php }elseif($newsletterSuccess){?>
                        	<h3 style="color: green; font-weight: bold;"> <?php echo $newsletterSuccess;?> </h3>
                        <?php }?>


                    </div>
                </div>
            </div>
        </div>
    </section>


	<section id="shop-1-3" class="content-block shop-1-3">
    	<div class="container">
    	
			<ul class="nav nav-tabs text-center" role="tablist" id="myTab">
				<li class="active"><a href="#tab1" role="tab" data-toggle="tab">Add new products</a></li>
				<li class=""><a href="#tab2" role="tab" data-toggle="tab">Messages <span class="badge" id="nbMSG"><?php echo "$nbr_msg";?></span></a></li>
				<li class=""><a href="#tab3" role="tab" data-toggle="tab">Purchases <span class="badge" id="nbPURCH"><?php echo $nbrUnseenOrder;?></span></a></li>
				<li class=""><a href="#tab4" role="tab" data-toggle="tab">Users <span class="badge" id="nbUSER"><?php echo $nbruser;?></span></a></li>
				
			</ul>
			
			<div id="tabbed-shop" class="tab-content">
				
				<div class="tab-pane fade active in" id="tab1">
					<div class="row">

					<form class="form-horizontal" id="add-form" action="admin.php" method="post" role="form" enctype="multipart/form-data">

								<div class="form-group">
							    <label for="category" class="col-sm-3 control-label">Category *: </label>
							    <div class="col-sm-7">
							    	<select class="form-control" name="category" id="category">
									  <option <?php if($_POST['category']== 'ladies wear') echo 'selected';?>>ladies wear</option>
									  <option <?php if($_POST['category']== 'bags') echo 'selected';?>>bags</option>
									  <option <?php if($_POST['category']== 'caps') echo 'selected';?>>caps</option>
									  <option <?php if($_POST['category']== 'jackets') echo 'selected';?>>jackets</option>
									  <option <?php if($_POST['category']== 'sunglasses') echo 'selected';?>>sunglasses</option>
									  <option <?php if($_POST['category']== 'shirts') echo 'selected';?>>shirts</option>
									  <option <?php if($_POST['category']== 'shoes') echo 'selected';?>>shoes</option>
									  <option <?php if($_POST['category']== 'decor') echo 'selected';?>>decor</option>
									  <option <?php if($_POST['category']== 'phones') echo 'selected';?>>phones</option>
									  <option <?php if($_POST['category']== 'computer') echo 'selected';?>>computer</option>
									  <option <?php if($_POST['category']== 'printers') echo 'selected';?>>printers</option>
									  <option <?php if($_POST['category']== 'cameras') echo 'selected';?>>cameras</option>
									  <option <?php if($_POST['category']== 'tv') echo 'selected';?>>tv</option>
									  <option <?php if($_POST['category']== 'household') echo 'selected';?>>household</option>
									  <option <?php if($_POST['category']== 'books') echo 'selected';?>>books</option>
									  <option <?php if($_POST['category']== 'drinks') echo 'selected';?>>drinks</option>
									  <option <?php if($_POST['category']== 'food') echo 'selected';?>>food</option>
									  <option <?php if($_POST['category']== 'vehicule') echo 'selected';?>>vehicule</option>
									  <option <?php if($_POST['category']== 'chinese specials') echo 'selected';?>>chinese specials</option>
									  <option <?php if($_POST['category']== 'others') echo 'selected';?>>others</option>
									</select>							      
							      </div>
							  </div>
		  
							  <div class="form-group">
							    <label for="title" class="col-sm-3 control-label" >Title *: </label>
							    <div class="col-sm-7">
							      <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $_POST['title'];?>">
							      </div>
							  </div>
							  <div class="form-group">
							    <label for="description" class="col-sm-3 control-label">Description *: </label>
							    <div class="col-sm-7">
							      <!-- <input type="password" class="form-control" name="message"  id="message" placeholder="Message" > -->
							     <textarea class="form-control" rows="3" name="description"  id="description" placeholder="  Description"><?php echo $_POST['description'];?></textarea>
							    
							    </div>
							    </div>

							   <div class="form-group">
							    <label for="price" class="col-sm-3 control-label">Price *: </label>
							    <div class="col-sm-7">							         
							      <input name="price" id="price" class="form-control" type="number" style="width: 80px; padding: 3px; height: 35px" min="1" value="<?php echo $_POST['price'];?>">
							      </div>
							  </div>
							  <div class="form-group">
							    <label for="old_price" class="col-sm-3 control-label">Old Price: </label>
							    <div class="col-sm-7">
							    	<input name="old_price" id="old_price" class="form-control" type="number" style="width: 80px; padding: 3px; height: 35px" min="0" value="<?php if($_POST['old_price'] !=0) echo $_POST['old_price']; else echo "0";?>">
							      
							      </div>
							  </div>
							  <div class="form-group">
							    <label for="special" class="col-sm-3 control-label">Special : </label>
							    <div class="col-sm-7">
							    	<select class="form-control" name="special" id="special" >
									  <option <?php if($_POST['special']== ' ') echo 'selected';?>></option>
									  <option <?php if($_POST['special']== 'new') echo 'selected';?>>new</option>
									  <option <?php if($_POST['special']== 'old') echo 'selected';?>>old</option>									 
									</select>
							      
							      </div>
							  </div>


							  <div class="form-group">
							    <label for="image1" class="col-sm-3 control-label">Image 1 *: </label>
							    <div class="col-sm-7">
							    	<input type="file" id="image1" name="image1">
							    	<p class="help-block">The standard size is 440x586 for images. Allowed extensions: .jpg .jpeg .png</p>
							      </div>
							  </div>
							  <div class="form-group">
							    <label for="image2" class="col-sm-3 control-label">Image 2: </label>
							    <div class="col-sm-7">
							    	<input type="file" id="image2" name="image2">
							    	<p class="help-block">The standard size is 440x586 for images. Allowed extensions: .jpg .jpeg .png</p>
							      </div>
							  </div>
								

								<div class="form-group">
							    <label for="image3" class="col-sm-3 control-label">Image 3: </label>
							    <div class="col-sm-7">
							    	<input type="file" id="image3" name="image3">
							    	<p class="help-block">The standard size is 440x586 for images. Allowed extensions: .jpg .jpeg .png</p>
							      </div>
							  </div>

							  <div class="form-group">
							    <label for="image4" class="col-sm-3 control-label">Image 4: </label>
							    <div class="col-sm-7">
							    	<input type="file" id="image4" name="image4">
							    	<p class="help-block">The standard size is 440x586 for images. Allowed extensions: .jpg .jpeg .png</p>
							      </div>
							  </div>
							  <div class="form-group">
							    <label for="image5" class="col-sm-3 control-label">Image 5: </label>
							    <div class="col-sm-7">
							    	<input type="file" id="image5" name="image5">
							    	<p class="help-block">The standard size is 440x586 for images. Allowed extensions: .jpg .jpeg .png</p>
							      </div>
							  </div>
						


							  <div class="form-group">
							    <div class="col-sm-offset-3 col-sm-10">
							       
							       <button type="submit" name="addProd-submit" id="addProd-submit"  class="btn btn-success" value="Add">Add</button>
							    </div>
							  </div>
					</form>
						
						
						
						
					</div><!-- /.row -->
										
				</div><!-- /#tab1 -->
				
				
				<div class="tab-pane fade" id="tab2">
					<div class="row ">
						<?php for($x=0;$x<count($messages);$x++){ ?>
							<div class="col-md-8 col-md-offset-2">
								<div <?php echo 'id="msgID'.$messages[$x]['msg_id'].'"'; ?> <?php if(trim($messages[$x]['seen'])==0){echo 'class="msgUnread"';}else if($messages[$x]['seen']==1){ echo 'class="msgRead"'; }?> data-toggle="modal" <?php echo 'data-target="#myModal'.$x.'"'; echo 'onclick="openMsg('.$messages[$x]['msg_id'].')"';?> >
									<h5><?php echo $messages[$x]['user_name']; ?> &lt;<?php echo $messages[$x]['user_email']; ?>&gt;</h5>
									<p><?php echo substr($messages[$x]['user_message'], 0,105) ?> ...</p>
								</div>
							</div>
							
							<div class="modal fade" <?php echo 'id="myModal'.$x.'"'; ?> tabindex="-1" role="dialog" <?php echo 'aria-labelledby="myModalLabel'.$x.'"'; ?>>
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" <?php echo 'id="myModalLabel'.$x.'"'; ?> >Message</h4>
								     	</div>
								      	<div class="modal-body">
								      		<div class="row">
								      			<div class="col-md-6">
								      				<p><strong>From:</strong>&nbsp;&nbsp;<?php echo $messages[$x]['user_name']; ?></p>
								      				<p><strong>Email:</strong>&nbsp;&nbsp;<?php echo $messages[$x]['user_email']; ?></p>
								      			</div>
								      			<div class="col-md-6 ">
								      				<p><strong>Phone:</strong>&nbsp;&nbsp;<?php echo $messages[$x]['user_phone']; ?></p>
								      				<p><strong>Date&Time:</strong>&nbsp;&nbsp;<?php echo $messages[$x]['time']; ?></p>
								      			</div>
								      			<div class="col-md-10 col-md-offset-1">
								      				<p><?php echo $messages[$x]['user_message']; ?></p>
								      			</div>
								      			
								      		</div> 
								     	 </div> 							     	      
								    </div>
								  </div>
							</div>
						<?php } ?>						
						
					</div><!-- /.row -->
				</div><!-- /#tab5 -->
				<div class="tab-pane fade" id="tab3">
					<div class="row ">
						<?php for($x=0;$x<count($nbUSR);$x++){ 

							?>
							<div class="col-md-8 col-md-offset-2">
								<div <?php echo 'id="chkID'.$x.'"'; ?> <?php if(trim($nbUSR[$x]['seen'])==0){echo 'class="msgUnread"';}else if($nbUSR[$x]['seen']==1){ echo 'class="msgRead"'; }?> data-toggle="modal" <?php echo 'data-target="#myModalC'.$x.'"'; echo 'onclick="openChk('.$x.', \''.$nbUSR[$x]['filter'].'\')"';?> >
									<h5><?php echo $nbUSR[$x]['name']; ?> &lt;<?php echo $nbUSR[$x]['phone']; ?>&gt;&lt;<?php echo $nbUSR[$x]['email']; ?>&gt;</h5>
									<p><?php echo $nbUSR[$x]['address'] ;?> </p>
								</div>
							</div>
							
							<div class="modal fade" <?php echo 'id="myModalC'.$x.'"'; ?> tabindex="-1" role="dialog" <?php echo 'aria-labelledby="myModalLabelC'.$x.'"'; ?>>
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" <?php echo 'id="myModalLabelC'.$x.'"'; ?> >Message</h4>
								     	</div>
								      	<div class="modal-body">
								      		<div class="row">
								      			<div class="col-md-6">
								      				<p><strong>From:</strong>&nbsp;&nbsp;<?php echo $nbUSR[$x]['name']; ?></p>
								      				<p><strong>Email:</strong>&nbsp;&nbsp;<?php echo $nbUSR[$x]['email']; ?></p>
								      			</div>
								      			<div class="col-md-6 ">
								      				<p><strong>Phone:</strong>&nbsp;&nbsp;<?php echo $nbUSR[$x]['phone']; ?></p>
								      				<p><strong>Date&Time:</strong>&nbsp;&nbsp;<?php echo $nbUSR[$x]['time']; ?></p>
								      			</div>
								      			<div class="col-md-12">
								      				<table class="table table-bordered table-striped mb-none">
														<thead>	<tr>
																<th class="centera">Title</th>
																<th class="centera">Price</th>
																<th class="centera">Quantity</th>
																<th class="centera">Total</th>										
														</tr></thead>
														<tbody>
									      				<?php $chkItem = get_checkout($nbUSR[$x]['filter']);
									      						$tot = 0;
									      						for($i=0;$i<count($chkItem);$i++){
									      				?>
									      						<tr>
																<td><?php echo $chkItem[$i]['title']; ?></td>
																<td class="centera"><?php echo $chkItem[$i]['price']; ?></td>
																<td class="centera"><?php echo $chkItem[$i]['quantity']; ?></td>
																<td class="centera"><?php echo $chkItem[$i]['sale_price']; ?></td>										
																</tr>
									      				<?php $tot += $chkItem[$i]['sale_price'];} ?>
							
																<tr>
																<td></td>
																<td class="centera"></td>
																<td class="centera"><strong>TOTAL:</strong></td>
																<td class="centera"><?php echo $tot; ?></td>										
																</tr>
															
														</tbody></table>
								      			</div>
								      			
								      		</div> 
								     	 </div> 							     	      
								    </div>
								  </div>
							</div>
						<?php } ?>					
					</div><!-- /.row -->
				</div>
				<div class="tab-pane fade" id="tab4">
					<div class="row ">
						<div class="col-md-12">
		      				<table class="table table-bordered table-striped mb-none">
								<thead>	<tr>
										<th class="centera">ID</th>
										<th class="centera">Username</th>
										<th class="centera">Address</th>
										<th class="centera">Phone</th>										
										<th class="centera">Email</th>										
										<th class="centera">Delete</th>										
								</tr></thead>
								<tbody>
								<?php for($x=0;$x<$nbruser;$x++){ 	?>
									<tr <?php echo 'id="userDetail'.$x.'"'; ?>>									
									<td class="centera"><?php echo $membs[$x]['user_id'];?></td>
									<td class="centera"><?php echo $membs[$x]['name'];?></td>
									<td class="centera"><?php echo $membs[$x]['address'].'  '.$membs[$x]['city'];?></td>										
									<td class="centera"><?php echo $membs[$x]['phone'];?></td>										
									<td class="centera"><?php echo $membs[$x]['email'];?></td>										
									<td class="centera"><a href="#" <?php echo 'onclick="delUser('.$x.', \''.$membs[$x]['user_id'].'\')"';?>>Delete</a></td>										
									</tr>
								<?php } ?>
								
							</tbody></table>

					</div>
				</div>
				
				
			</div><!-- /.tab-content -->
			
    	</div><!-- /.container -->
	</section>










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
	<!-- // <script type="text/javascript" src="js/sendmail.js"></script>Contact Form -->
	<!-- // <script type="text/javascript" src="js/contact-form.php"></script><! Contact Form --> 
	<script type="text/javascript" src="js/custom.js"></script><!-- Contact Form -->
	
	<!--
	<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
	-->
	
	<!-- Theme Scripts (Do not remove) -->
	<script type="text/javascript" src="js/bskit-scripts.js"></script>

    <link href="css/scrolltop.css" rel="stylesheet">

	<script src="./js/jquery.scrolltotop.js"></script>
	


</body></html>