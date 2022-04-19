<?php
include("../connect.php");
$id= $_GET["id"];
$sql= "SELECT * FROM genre WHERE genreID = $id";
$result= mysqli_query($connect,$sql);
while($row=mysqli_fetch_assoc($result)){
	$genreID= $row['genreID'];
	$genreName= $row['genreName'];
	$genreDescription= $row['genreDescription'];
}
if(isset($_POST['insert_genre'])){
	$genre_name = $_POST['genre_name'];
	$genre_description = $_POST['genre_description'];
	
	if ($_POST['genre_name']=='') {
		$genre_name=$genreName;
	}
	if ($_POST['genre_description']=='') {
		$genre_description=$genreDescription;
	}
	
	$sql_up = " UPDATE genre SET genreName = '$genre_name',genreDescription= '$genre_description' WHERE genreID = $id";
	$insert_music = mysqli_query($connect, $sql_up);
	if($insert_music){
		header('location:genre.php');
		echo "<script>alert('genre Has Been updated successfully!')</script>";
	}
	else{
		echo "loi";
		

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
	<?php include('navbar_admin.php') ?>
	<div class="manager">
		<div  class="container-fluid">
			<div style="min-height: 500px" class="row">
				<div class="col-2">
					<div class="gird-title">
						<h3>Manager Music</h3>
						<ul>
							<li><a href="music.php">Music</a></li>
							<li><a href="singer.php">Singer</a></li>
							<li style="background-color: #cfcfcf"><a style="color: black" href="genre.php">Genre</a></li>
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
									<label for="qty" class="col-sm-12 control-label">Genre Name:</label>

								</div> <!-- form-group // -->
								<div class="col-sm-3">
									<input type="text" class="form-control" name="genre_name" id="qty" placeholder="" value="<?php echo $genreName ?>">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-2">
									<label for="qty" class="col-sm-12 control-label">Description:</label>

								</div> <!-- form-group // -->
								<div class="col-sm-3">
									<input type="text" class="form-control" name="genre_description" id="qty" placeholder="" value="<?php echo $genreDescription ?>">
								</div>
							</div>
							
							<hr>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-dark" name="insert_genre">Update</button>
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