<?php 
if(!empty($_POST['submit'])) {

	$file_name = $_FILES['image1']['name'];
	
	$file_temp= $_FILES['image1']['tmp_name'];
	echo "$file_temp     $file_name";
	//$file_path = 'C:/host/php/Temp/products/test22.jpg';
	 $file_path = 'C:/www/products/test.jpg';
	 move_uploaded_file($file_temp, $file_path);
	
}


?>



<form  id="add-form" action="" method="post" role="form" enctype="multipart/form-data">

	<input type="file" id="image1" name="image1">

	<button type="submit" name="submit" id="submit"   value="Add">Add</button>
	



</form>

<!-- <img src="C:/host/php/Temp/products/76c422c1acc2a443e60e404770448564.jpg" alt="tset"> -->
<img src="products/test.jpg" alt="tset">