<?php
include("../connect.php");
$singer=mysqli_query($connect,"SELECT * FROM singer");
$genre=mysqli_query($connect,"SELECT * FROM genre");
?>
<?php
$id= $_GET["id"];
$sql= "SELECT * FROM music,genre,singer WHERE musicID = $id";
$result= mysqli_query($connect,$sql);
while($row=mysqli_fetch_assoc($result)){
	$musicID= $row['musicID'];
	$musicName= $row['musicName'];
	$musicAudio= $row['musicAudio'];
	$musicLyric= $row['musicLyric'];
	$musicPrice= $row['musicPrice'];
	$musicImage= $row['musicImage'];
	$singerID= $row['singerID'];
	$singerName= $row['singerName'];
	$genreID= $row['genreID'];
	$genreName= $row['genreName'];
}
if(isset($_POST['insert_music'])){
	$music_name = $_POST['music_name'];
	$music_singer = $_POST['music_singer'];
	$music_price = $_POST['music_price'];   
	$music_genre = $_POST['music_genre'];
	$music_lyric = $_POST['music_lyric'];
	$name_image = $_FILES['music_image']['name'];
	$name_image_tmp=$_FILES['music_image']['tmp_name'];
	$name_audio = $_FILES['music_audio']['name'];
	$name_audio_tmp=$_FILES['music_audio']['tmp_name'];
	if ($_POST['music_name']=='') {
		$music_name=$musicName;
	}
	if ($_POST['music_singer']=='') {
		$music_singer=$singerID;
	}
	if ($_POST['music_price']=='') {
		$music_price=$musicPrice;
	}
	if ($_POST['music_genre']=='') {
		$music_genre=$GenreID;
	}
	if ($_POST['music_lyric']=='') {
		$music_lyric=$musicLyric;
	}
	if ($name_image=='') {
		$name_image=$musicImage;
	}
	if (isset($name_image)) {
		
		move_uploaded_file($name_image_tmp,"../image/$name_image");
	}
	if ($name_audio=='') {
		$name_audio=$musicAudio;
	}
	if (isset($name_audio)) {
		
		move_uploaded_file($name_audio_tmp,"../audio/$name_audio");	
	}
	$sql_up = " UPDATE music SET musicName = '$music_name',musicAudio= '$name_audio',musicLyric='$music_lyric',musicPrice='$music_price',musicImage='$name_image',singerID='$music_singer',genreID='$music_genre' WHERE musicID = $id";
	$insert_music = mysqli_query($connect, $sql_up);

	if($insert_music){
		header('location:music.php');
		echo "<script>alert('Music Has Been updated successfully!')</script>";
	}
	else{
		echo "loi";
		echo "$music_name||";
		echo "$music_singer||";
		echo "$music_price||";
		echo "$music_genre||";
		echo "$music_lyric||";
		echo "$name_image||";
		echo "$name_audio||";

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
	<title>edit mussic</title>
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
									<input type="text" class="form-control" name="music_name" id="qty" placeholder="" value="<?php echo $musicName ?>">
								</div>
							</div>
							<div class="row">	
								<div class="form-group col-sm-2">
									<label for="tech" class="col-sm-12 control-label">Singer:</label>

								</div> <!-- form-group // -->
								<div class="col-sm-3">
									
									<select class="form-control" name="music_singer" required value="<?php echo $singerID ?>" >
										<option value="<?php echo $singerID ?>"><?php echo $singerName ?></option>
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
									
									<select class="form-control" name="music_genre" required value="<?php echo $genreID ?>" >
										<option value="<?php echo $genreID ?>"><?php echo $genreName ?></option>
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
									
									<textarea class="form-control" name="music_lyric" id="" cols="30" rows="5" ><?php echo $musicLyric ?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-2">
									<label for="qty" class=" col-sm-12 control-label">Image:</label>

								</div> <!-- form-group // -->

								<div class="col-sm-3">
									<img width="100px" height="100px" src="../image/<?php echo $musicImage ?>" alt="">
									<input type="file" name="music_image" value="">
								</div>
							</div>
							<div style="padding-top: 8px" class="row">
								<div class="form-group col-sm-2">
									<label for="qty" class=" col-sm-12 control-label">Audio:</label>

								</div> <!-- form-group // -->

								<div class="col-sm-3">
									<audio controls>
										<source src="../audio/<?php echo $musicAudio ?>" type="audio/mpeg">
										</audio>
									</audio>
									<input type="file" name="music_audio" value="<?php echo $musicAudio ?>">
								</div>
							</div>
							<div style="padding-top: 8px" class="row">
								<div class="form-group col-sm-2">
									<label for="qty" class="col-sm-12 control-label">Price:</label>

								</div>
								<div class="col-sm-2">
									<input type="text" class="form-control" name="music_price" id="qty" placeholder="" value="<?php echo $musicPrice ?>">
								</div>
							</div>
							<hr>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-dark" name="insert_music">Update</button>
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