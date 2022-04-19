<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="..\bootstrap\css\bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<title>User</title>
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
			font-size: 20px
			
		}
		.col-10{
			background-color: #cfcfcf;
		}
		.col-10 img{
			
			margin-left:100px

		}
		.col-10 h1{
			font-family: SVN-Franko;
			font-size: 150px;
			transform: translateX(50%);

		}
		.table-mussic .gird-table tr, th, td{
			border-left: 1px solid silver;
			text-align: center;
		}
		.col-10 .btn-adduser{
			margin-bottom: 20px

		}
		.col-10 .btn-adduser a{
			background-color: gray;
			color: #cfcfcf;
			padding: 10px;
			border-radius: 5px;
			text-decoration: none;
		}
		.col-10 .btn-adduser a:hover{
			transition: 0.4s;
			background-color: black;
			color: silver;
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
							<li><a href="genre.php">Genre</a></li>
						</ul>
						<h3>Manager User</h3>
						<ul>
							<li style="background-color: #cfcfcf"><a style="color: black" href="user.php">User</a></li>
						</ul>
					</div>
				</div>
				<div class="col-10">
					
					<div class="table-singer">
						<table style="width: 1200px" class="gird-table">
							<tr style="background-color: gray; text-align: center">
								<th style="width: 20%">User</th>
								<th style="">Full Name</th>
								<th style="">userEmail</th>
								<th style="">userPassword</th>
								<th style="">userRole</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							<?php 
							include('../connect.php');
							$sql = "select * from user ";
							$result = mysqli_query($connect,$sql);
//tra ket qua 1 mang
							while($row=mysqli_fetch_assoc($result)){
								$userID= $row['userID'];
								$userName= $row['userName'];
								$fullname= $row['fullname'];
								$userEmail= $row['userEmail'];
								$userPassword= $row['userPassword'];
								$userRole= $row['userRole'];
								?>
								<tr>
									<td><?php echo $userName ?></td>
									<td><?php echo $fullname ?></td>
									<td><?php echo $userEmail ?></td>
									<td><?php echo $userPassword ?></td>
									<td><?php echo $userRole ?></td>
									<td><a href="edit_singer.php?id=<?php echo $userID ?>">edit</a></td>
									<td><a onclick="return Del('<php echo $row['musicName']; ?>')" href="?id=<?php echo $userID ?>">delete</a></td>
								</tr>
								
							<?php } ?>


							
						</table>
						<?php 
						if(isset($_GET["id"])){
							$id = $_GET["id"];
							$sql="DELETE FROM user where userID = $id";
							$result=mysqli_query($connect,$sql);
							if($result) {
								echo "<script> alert ('Xóa thành công!')</script>";echo "<script>window.open('user.php','_self')</script>";

							}
						} 
						?>
					</div>
					<hr>
					<div class="btn-adduser">
						<a href="add_user.php">Add User</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>