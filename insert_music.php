<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<title>Document</title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">    
		<table align="center" width="100%">      
			<tr>
				<td colspan="7">
					<h2>Add Music</h2>
					<div class="border_bottom"></div><!--/.border_bottom -->
				</td>
			</tr>

			<tr>
				<td><b>Product Name:</b></td>
				<td><input type="text" name="music_name" size="60" required/></td>
			</tr>
			<tr>
				<td><b>Product Image: </b></td>
				<td><input type="file" name="music_image" /></td>
			</tr>

			<tr>
				<td><b>Product Image: </b></td>
				<td><input type="file" name="music_image" /></td>
			</tr>

			<tr>
				<td><b>Product Price: </b></td>
				<td><input type="text" name="product_price" required/></td>
			</tr>
			
			<tr>
				<td><b>SingerID: </b></td>
				<td><input type="text" name="product_price" required/></td>
			</tr>
			<tr>
				<td><b>CategoryID: </b></td>
				<td><input type="text" name="product_price" required/></td>
			</tr>
			<tr>
				<td valign="top"><b>Product Description:</b></td>
				<td><textarea name="product_description" cols="80%" rows="10"></textarea></td>
			</tr>

			<tr>
				<td></td>
				<td colspan="7"><input type="submit" name="insert_post" value="Add Product"/></td>
			</tr>
		</table>

	</form>
	<?php
	include("connect.php");
	if(isset($_POST['insert_post'])){
	$product_name = $_POST['product_name'];
	$product_price = $_POST['prouduct_price'];
	$product_description = $_POST['product_description'];  

	// Getting the image from the field

	$product_image  = $_FILES['product_image']['name'];
	$product_image_tmp = $_FILES['product_image']['tmp_name'];


	move_uploaded_file($product_image_tmp,"Images/$product_image");   


	$sql = " INSERT INTO products VALUES (NULL,'$product_name','$product_price','$product_image','$product_description') ";


	$insert_pro = mysqli_query($connect, $sql);

	if($insert_pro){
	echo "<script>alert('Product Has Been inserted successfully!')</script>";
	echo "<script>window.open('index.html','_self')</script>";
}

}
?>
</body>
</html>