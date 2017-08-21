<?php

require'product-model.php';
include 'databaseConnect/init.php';

$user_id = (int) $_COOKIE['user_id'];
$product_model = new ProductModel();

$prodData = $product_model->getDetailsById($_GET['id']);
$product_id = (int) $_GET['id'];

if($_GET['qty']){
	$quantity = (int) $_GET['qty'];
}else{
	$quantity = 1;
}

if(product_exists($product_id)){
	if($_GET['qty']){
		$add = (int) $_GET['qty'];
	}else{
		$add = 1;
	}
	$quantity = product_exists($product_id) + $add;
	$sale_price =  $prodData[0]['price'] * $quantity;
	mysql_query("UPDATE `cart` SET `quantity`='$quantity',`sale_price`='$sale_price' WHERE `product_id` = '$product_id'");
	
}else{
	$sale_price =  $prodData[0]['price'] * $quantity;
	mysql_query("INSERT INTO `meiyi`.`cart`(`product_id`, `user_id`, `quantity`, `sale_price`) VALUES ('$product_id','$user_id',$quantity,$sale_price)");
}

echo "<script type='text/javascript' >alert('Your Product have been added to your cart. Thank you!');</script>";
$url = $_GET['url'];
echo "<script type=\"text/javascript\">   window.location = \"$url\"  </script>"; 


?>