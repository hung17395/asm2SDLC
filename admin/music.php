<?php 
session_start();
include('../connect.php');
$sql = "select * from  music,singer,genre WHERE music.singerID= singer.singerID and music.genreID = genre.genreID";
$result = mysqli_query($connect,$sql);
//tra ket qua 1 mang
while($row=mysqli_fetch_array($result)){
	$musicID= $row['musicID'];
	$musicName= $row['musicName'];
	$musicAudio= $row['musicAudio'];
	$musicLyric= $row['musicLyric'];
	$musicPrice= $row['musicPrice'];
	$musicImage= $row['musicImage'];
	$singerID= $row['singerID'];
	$genreID= $row['genreID'];
	$singerName= $row['singerName'];
	$genreName=$row['genreName'];
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
	<title>Admin</title>
	<style type="text/css">
		tr th a{
			color: black;
		}
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
		.table-mussic{
			
			border-radius: 20px;
		}
		.table-mussic .gird-table{
			width: 90%;
			height: auto;
			margin: 40px 40px;	
			padding-top: 50px;

		}
		.table-mussic .gird-table tr, th, td{
			border-left: 1px solid silver;
			text-align: center;
		}
		.col-10 .btn-addmusic{
			margin-bottom: 20px
		}
		.col-10 .btn-addmusic a{
			background-color: gray;
			color: #cfcfcf;
			padding: 10px;
			border-radius: 5px;
			text-decoration: none;
		}
		.col-10 .btn-addmusic a:hover{
			transition: 0.4s;
			background-color: black;
			color: silver;
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
					<div class="table-mussic">
						<table class="gird-table">
							<tr style="height: 30px;background-color: gray">
								<th style="width:10%">Name Music</th>
								<th style="width:20%">Mussic Audio</th>
								<th style="5%">Price</th>
								<th style="width: 10%">Image</th>
								<th style="width: ">Singer</th>
								<th>Genre</th>
								<th>Edit</th>
								<th style="5%">Delete</th>
							</tr>
							<?php 
							include('../connect.php');
							$sql = "select * from  music,singer,genre WHERE music.singerID= singer.singerID and music.genreID = genre.genreID";
							$result = mysqli_query($connect,$sql);
//tra ket qua 1 mang
							while($row=mysqli_fetch_array($result)){
								$musicID= $row['musicID'];
								$musicName= $row['musicName'];
								$musicAudio= $row['musicAudio'];
								$musicLyric= $row['musicLyric'];
								$musicPrice= $row['musicPrice'];
								$musicImage= $row['musicImage'];
								$singerID= $row['singerID'];
								$genreID= $row['genreID'];
								$singerName= $row['singerName'];
								$genreName=$row['genreName'];
								?>
								<tr>
									<td><?php echo $musicName ?></td>
									<td><audio controls>
										<source src="../audio/<?php echo $musicAudio ?>" type="audio/mpeg">
										</audio>
									</td>

									<td><?php echo $musicPrice ?></td>
									<td><img style='width: 100px;height: 100px' src="../image/<?php echo $musicImage ?>" alt=''></td>
									<td><?php echo $singerName ?></td>
									<td><?php echo $genreName ?></td>
									<th><a href="edit_music.php?id=<?php echo $musicID ?>">edit</a></th>
									<th><a onclick="return Del('<php echo $row['musicName']; ?>')" href="?id=<?php echo $musicID ?>">delete</a></th>
								</tr>
								
							<?php } ?>


							
						</table>
						<?php 
						if(isset($_GET["id"])){
							$id = $_GET["id"];
							$sql="DELETE FROM music where musicID = $id";
							$result=mysqli_query($connect,$sql);
							if($result) {
								echo "<script> alert ('Xóa thành công!')</script>";echo "<script>window.open('music.php','_self')</script>";

							}
						} 
						?>
					</div>
					<div class="btn-addmusic">
						<a href="add_music.php?page_layout=add
						_music">Add music</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		function Del(name){
			return confirm("ban co chac chan muon xoa: " +name + "?");
		}
	</script>
</body>
</html>