
<?php 

require'product-model.php';
include 'databaseConnect/init.php';

$user_id = (int) $_COOKIE['user_id'];
$product_id = (int) $_GET['id'];

mysql_query("DELETE FROM `cart` WHERE `user_id`='$user_id' AND `product_id`='$product_id' ");
echo "<script type='text/javascript' >alert('Product deleted from cart.');</script>";
$url = $_GET['url'];
echo "<script type=\"text/javascript\">   window.location = \"$url\"  </script>"; 
 ?>
