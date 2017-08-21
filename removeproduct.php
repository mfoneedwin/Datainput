<?php 

include 'databaseConnect/init.php';

$product_id = (int) $_GET['id'];
mysql_query("DELETE FROM `cart` WHERE `product_id`='$product_id'");
mysql_query("DELETE FROM `products` WHERE `product_id`='$product_id'");


echo "<script type='text/javascript' >alert('Product deleted.');</script>";
$url = $_GET['url'];
echo "<script type=\"text/javascript\">   window.location = \"$url\"  </script>"; 

 ?>