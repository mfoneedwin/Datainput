<?php
//require'product-model.php';
include 'databaseConnect/init.php';

$user_id = (int) $_COOKIE['user_id'];


if (isset($_POST['openCHK'])){
	$uid = $_POST['openCHK'];
	$sql = "UPDATE `checkout` SET `seen`=1 WHERE `filter`=$uid";
	$query = mysql_query($sql);
	echo "success";

	exit();
}
if(isset($_POST['delUSER'])){
	$uid = $_POST['delUSER'];
	$sql = "DELETE FROM `members` WHERE  `user_id`=$uid";
	$query = mysql_query($sql);
	echo "success";
	exit();
}


if (isset($_POST['checkout'])){

	$data = array();
	$data2 = array();
	$query = mysql_query("SELECT `cart`.`quantity`, `cart`.`sale_price`, `products`.`title`, `products`.`price` FROM `cart` JOIN `products` ON `cart`.`product_id`=`products`.`product_id`  WHERE `cart`.`user_id`=$user_id");
	while ($row = mysql_fetch_assoc($query)) {
		$data [] = $row;		
	}	

	$query2 = mysql_query("SELECT `name`,`address`,`city`,`phone`,`email` FROM `members` WHERE `user_id`=$user_id");
	while ($row2 = mysql_fetch_assoc($query2)) {
		$data2 [] = $row2;		
	}

	$name = $data2[0]['name'];
	$addressUser = $data2[0]['address']." ".$data2[0]['city'];
	$phone = $data2[0]['phone'];
	$email = $data2[0]['email'];
	$filter = time();

	for ($x=0;$x<count($data);$x++){
			$quantity = $data[$x]['quantity'];
			$price = $data[$x]['price'];
			$sale_price = $data[$x]['sale_price'];
			$title = $data[$x]['title'];
			$insert = mysql_query("INSERT INTO `checkout`(`user_id`, `name`, `email`, `address`, `phone`, `quantity`, `price`, `sale_price`, `title`,`time`,`seen`,`filter`) VALUES ($user_id,'$name','$email','$addressUser','$phone',$quantity,$price,$sale_price,'$title',now(),0,$filter)");	
			$delete = mysql_query("DELETE FROM `cart` WHERE `user_id`=$user_id");
		}
	echo "success";
	exit();

}