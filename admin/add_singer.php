<?php
include("../connect.php");
if(isset($_POST['insert_singer'])){
	$singer_name = $_POST['singer_name'];
	$singer_descripton = $_POST['singer_description'];
	$sql = " INSERT INTO singer VALUES (NULL,'$singer_name','$singer_descripton')";
	$insert_singer = mysqli_query($connect, $sql);

	if($insert_singer){
		echo "<script>alert('Singer Has Been inserted successfully!')</script>";
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
	<title>Add singer</title>
	<style>
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
			font-size: 20px
			
		}
		.col-10{
			background-color: #cfcfcf;
		}
		.add-singer{
			margin-top: 10px
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
							<li style="background-color: #cfcfcf"><a style="color: black" href="singer.php">Singer</a></li>
							<li><a href="genre.php">Genre</a></li>
						</ul>
						<h3>Manager User</h3>
						<ul>
							<li><a href="user.php">User</a></li>
						</ul>
					</div>
				</div>
				<div class="col-10">
					<div class="add-singer">
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="form-group col-sm-2">
									<label for="qty" class="col-sm-12 control-label">Singer Name:</label>

								</div> <!-- form-group // -->
								<div class="col-sm-3">
									<input type="text" class="form-control" name="singer_name" id="qty" placeholder="">
								</div>
							</div>
							<div style="padding-bottom: 10px" class="row">
								<div class="form-group col-sm-2">
									<label for="qty" class="col-sm-3 control-label">Description:</label>

								</div> <!-- form-group // -->
								<div class="col-sm-3">
									
									<textarea class="form-control" name="singer_description" id="" cols="30" rows="5"></textarea>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-dark" name="insert_singer">Completed</button>
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