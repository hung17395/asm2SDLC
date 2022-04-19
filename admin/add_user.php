<?php
include("../connect.php");
$singer=mysqli_query($connect,"SELECT * FROM singer");
$genre=mysqli_query($connect,"SELECT * FROM genre");
?>
<?php
if(isset($_POST['insert_music'])){
	$user_Name = $_POST['user_Name'];
	$fullname = $_POST['fullname'];
	$user_Email = $_POST['user_Email'];   
	$user_Password = $_POST['user_Password'];
	$user_Role = $_POST['user_Role'];
	$sql = " INSERT INTO user VALUES (NULL,'$user_Name','$fullname','$user_Email','$user_Password','$user_Role') ";
	$insert_music = mysqli_query($connect, $sql);

	if($insert_music){
		echo "<script>alert('User Has Been inserted successfully!')</script>";
		// echo "<script>window.open('add_music.php','_self')</script>";
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

	<div class="manager">
		<div  class="container-fluid">
			<div style="min-height: 500px" class="row">
				<div class="col-2">
					<div class="gird-title">
						<h3>Manager Music</h3>
						<ul>
							<li><a style="color: black" href="music.php">Music</a></li>
							<li><a href="singer.php">Singer</a></li>
							<li><a href="genre.php">Genre</a></li>
						</ul>
						<h3>Manager User</h3>
						<ul>
							<li  style="background-color: #cfcfcf"><a href="user.php">User</a></li>
						</ul>
					</div>
				</div>
				<div class="col-10">
					<div class="add-mussic">
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="form-group col-sm-2">
									<label for="qty" class="col-sm-12 control-label">UserName:</label>

								</div> <!-- form-group // -->
								<div class="col-sm-3">
									<input type="text" class="form-control" name="user_Name" id="qty" placeholder="">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-2">
									<label for="qty" class="col-sm-12 control-label">Full Name:</label>

								</div> <!-- form-group // -->
								<div class="col-sm-3">
									<input type="text" class="form-control" name="fullname" id="qty" placeholder="">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-2">
									<label for="qty" class="col-sm-12 control-label">Email:</label>

								</div> <!-- form-group // -->
								<div class="col-sm-3">
									<input type="text" class="form-control" name="user_Email" id="qty" placeholder="">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-2">
									<label for="qty" class="col-sm-12 control-label">Password:</label>

								</div> <!-- form-group // -->
								<div class="col-sm-3">
									<input type="text" class="form-control" name="user_Password" id="qty" placeholder="">
								</div>
							</div>

							<div class="row">	
								<div class="form-group col-sm-2">
									<label for="tech" class="col-sm-12 control-label">Role:</label>

								</div> <!-- form-group // -->
								<div class="col-sm-1">
									<select class="form-control" name="user_Role">
										<option selected="selected" >user</option>
										<option >admin</option>
									</select>
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