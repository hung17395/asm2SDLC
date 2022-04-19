<?php
include("../connect.php");
$singer=mysqli_query($connect,"SELECT * FROM singer");
$genre=mysqli_query($connect,"SELECT * FROM genre");
?>
<?php
if(isset($_POST['insert_music'])){
	$music_name = $_POST['music_name'];
	$music_singer = $_POST['music_singer'];
	$music_price = $_POST['music_price'];   
	$music_genre = $_POST['music_genre'];
	$music_lyric = $_POST['music_lyric'];
   // Getting the image, audio from the field
/*	$music_image  = $_FILES['music_image']['name'];
	$music_image_tmp = $_FILES['music_image']['tmp_name'];
	$music_audio  = $_FILES['music_audio']['name'];
	$music_audio_tmp = $_FILE*/
	
	if (isset($_FILES['music_image'])) {
		$file_image= $_FILES['music_image'];
		$name_image= $file_image['name'];
		move_uploaded_file($file_image['tmp_name'],"../image/$name_image");
		


	}
	if (isset($_FILES['music_audio'])) {
		$file_audio=$_FILES['music_audio'];
		$name_audio=$file_audio['name'];
		move_uploaded_file($file_audio['tmp_name'],"../audio/$name_audio");
		
	}

	$sql = " INSERT INTO music VALUES (NULL,'$music_name','$name_audio','$music_lyric','$music_price','$name_image','$music_singer','$music_genre') ";
	
	$insert_music = mysqli_query($connect, $sql);

	if($insert_music){
		echo "<script>alert('Music Has Been inserted successfully!')</script>";
		echo "<script>window.location.href='add_music.php'</script>";
	}
	else{
		echo "loi";
		echo "$music_genre";
		echo "$music_singer";
	}

} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="..\bootstrap\css\bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<title>Add mussic</title>
	<style type="text/css">
		
		.manager{
			margin-top: 70px;
			
		}
		.col-2{
			background-color: silver;
			text-align: center;
		}
		.col-2 .gird-title{
			transform: translateY(50%)
		}
		.col-2 .gird-title h3{
			font-weight: bold;
		}
		.col-2 .gird-title ul li a{
			text-decoration: none;
			color: gray;
			font-size: 20px;
		}
		.col-10{
			background-color: #cfcfcf;
		}

	</style>
</head>
<body>
	<?php include("navbar_admin.php") ?>
	<div class="manager">
		<div  class="container-fluid">
			<div class="row">
				<div class="col-2">
					<div class="gird-title">
						<h3>Manager Music</h3>
						<ul>
							<li style="background-color: #cfcfcf"><a style="color: black" href="music.php">Music</a></li>
							<li><a href="singer.php">Singer</a></li>
							<li><a href="genre.php">Genre</a></li>
						</ul>
						<h3>Manager User</h3>
						<ul>
							<li><a href="user.php">User</a></li>
						</ul>
					</div>
				</div>
				<div class="col-10">
					<div class="add-mussic">
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="form-group col-sm-2">
									<label for="qty" class="col-sm-12 control-label">Music Name:</label>

								</div> <!-- form-group // -->
								<div class="col-sm-3">
									<input type="text" class="form-control" name="music_name" id="qty" placeholder="">
								</div>
							</div>
							<div class="row">	
								<div class="form-group col-sm-2">
									<label for="tech" class="col-sm-12 control-label">Singer:</label>

								</div> <!-- form-group // -->
								<div class="col-sm-3">
									
									<select class="form-control" name="music_singer">
										<?php foreach ($singer as $key => $value) { ?>
											<option value="<?php echo $value['singerID'] ?>"><?php echo $value['singerName'] ?> </option>
										<?php } ?>
										
									</select>
								</div>
							</div>
							<div class="row">	
								<div class="form-group col-sm-2">
									<label for="tech" class="col-sm-12 control-label">Genre:</label>

								</div> <!-- form-group // -->
								<div class="col-sm-3">
									
									<select class="form-control" name="music_genre">
										<?php foreach ($genre as $key => $value) { ?>
											<option value="<?php echo $value['genreID'] ?>"><?php echo $value['genreName'] ?> </option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div style="padding-bottom: 10px" class="row">
								<div class="form-group col-sm-2">
									<label for="qty" class="col-sm-3 control-label">lyric:</label>

								</div> <!-- form-group // -->
								<div class="col-sm-3">
									
									<textarea class="form-control" name="music_lyric" id="" cols="30" rows="5"></textarea>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-2">
									<label for="qty" class=" col-sm-12 control-label">Image:</label>

								</div> <!-- form-group // -->

								<div class="col-sm-3">
									<input type="file" name="music_image">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-2">
									<label for="qty" class=" col-sm-12 control-label">Audio:</label>

								</div> <!-- form-group // -->

								<div class="col-sm-3">
									<input type="file" name="music_audio">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-2">
									<label for="qty" class="col-sm-12 control-label">Price:</label>

								</div>
								<div class="col-sm-2">
									<input type="text" class="form-control" name="music_price" id="qty" placeholder="">
								</div>
							</div>
							<hr>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-dark" name="insert_music">Completed</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>