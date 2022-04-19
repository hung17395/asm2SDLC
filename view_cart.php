<?php 
include('connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<title>Index</title>
	<style type="text/css">

		.title h1{
			font-weight: bold;
			text-transform: uppercase;
		}
		.list-music{
			
			display: block;

		}
		.gird-box{
			width: 100%;
			padding-left: 0px;
			padding-right: 0px;
			margin-left: auto;
			margin-right: auto;
			margin: 5px auto;
		}
		.box-music{

			display: flex;
			z-index: 1;
			width: auto;
			height: 160px;
			border-radius: 10px;
			/* margin: 5px 10px; */
			padding: 0px 0px;
			margin-bottom: 15px ;
			transition: 0.4s;
			background: linear-gradient(to right top,gray,#f5f5f5);
		}
		
		/* singer */
		.hot-singer{
			margin-top: 10px;
		}
		.singer-image{
			display: flex;
			margin-left: auto;
			margin-top: auto;
		}
		.col-3 img{
			display: block;
			text-align: center;
			width: 150px;
			height: 150px;
			border-radius: 50%;	
			margin-left: auto;
			margin-right: auto;
		}
		.singer-name h5{
			padding-top: 5px;
			text-align: center;
		}
		.tb-cart tr,th, td{
			border-bottom: 1px solid silver;
		}
		tr th a{
			padding: 5px 10px;
			border-radius: 5px;
			background-color: silver;
			transition: 0.4s;
		}
		tr th a:hover{
			transition: 0.4s;
			text-decoration: none;
			background-color: black;
			color: silver;
		}
	</style>
</head>
<body>
	<header>
		<?php include("element/navbar.php"); ?>
	</header>
	<div style="" class="slideshow">
		<?php include("element/slide.php"); ?>
	</div>
	<br><br><br>
	<div class="container">
		<div class="title">
			<h1>Cart</h1>
			<table class="tb-cart" style="width: 100%">
				<tr style="">
					<th>User</th>
					<th>Music</th>
					<th>Audio</th>
					<th>Price</th>

				</tr>
				<tr>
					<?php 
					
					$sql = "select * from  cart,music,user WHERE cart.userID= user.userID and cart.musicID = music.musicID";
					$result = mysqli_query($connect,$sql);
//tra ket qua 1 mang
					while($row=mysqli_fetch_array($result)){
						$musicID= $row['musicID'];
						$musicName= $row['musicName'];
						$musicAudio= $row['musicAudio'];
						$musicLyric= $row['musicLyric'];
						$musicPrice= $row['musicPrice'];
						$musicImage= $row['musicImage'];
						$userID= $row['userID'];
						$userName= $row['userName'];
						$cartID= $row['cartID'];
						
						?>
						<tr>
							<td><?php echo $userName ?></td>
							<td><?php echo $musicName ?></td>
							<td><audio controls>
								<source src="audio/<?php echo $musicAudio ?>" type="audio/mpeg">
								</audio>
							</td>

							<td><?php echo $musicPrice ?></td>
							<td><img style='width: 100px;height: 100px' src="image/<?php echo $musicImage ?>" alt=''></td>
							
							<th><a style="" href="edit_music.php?id=<?php echo $musicID ?>">Buy</a></th>
							<th><a onclick="return Del('<php echo $row['musicName']; ?>')" href="?id=<?php echo $cartID ?>">delete</a></th>
							</tr>

						<?php } ?>



					</tr>
				</table>
				<?php 
				if(isset($_GET["id"])){
					$id = $_GET["id"];
					$sql="DELETE FROM cart where cartID = $id";
					$result=mysqli_query($connect,$sql);
					if($result) {
						echo "<script> alert ('Xóa thành công!')</script>";echo "<script>window.open('view_cart.php','_self')</script>";

					}
				} 
				?>
			</div>
		</div>
		<div style="padding-bottom: 30px" class=" container">
			<div class="row">

				<div class="container">
					<div class="title">
						<h1>Hot Singer</h1>
					</div>
				</div>
				<div class="hot-singer container">
					<div class="row">
						<div class="col-3">

							<img src="https://i1.sndcdn.com/artworks-000213572138-e0diu8-t500x500.jpg" alt="">

							<div class="singer-name">
								<h5>Thái Hoàng</h5>
							</div>
						</div>
						<div class="col-3">
							<div class="singer-image">
								<img src="https://pbs.twimg.com/profile_images/1464164070047862784/FCqkIsM3_400x400.jpg" alt="">
							</div>
							<div class="singer-name">
								<h5>Alan Walker</h5>		
							</div>
						</div>
						<div class="col-3">
							<div class="singer-image">
								<img src="https://djcloudvn.sgp1.digitaloceanspaces.com/data/resource_icons/1/1779.jpg?1625026794" alt="">
							</div>
							<div class="singer-name">
								<h5>ARS</h5>
							</div>
						</div>
						<div class="col-3">
							<div class="singer-image">
								<img src="https://yt3.ggpht.com/ytc/AKedOLQyRFhSmB12AM3-yzDW_rhwSi3Q0qG3pjnh0UTz=s900-c-k-c0x00ffffff-no-rj" alt="">
							</div>
							<div class="singer-name">
								<h5>Tilo</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include("element/footer.php"); ?>

	<script type="text/javascript">
		function myaudio(event){
			if(event.currentTime>5){
				event.currentTime=0;
				event.pause();
				alert("Bạn phải trả phí để nghe cả bài");
			}
		}
	</script>
</body>

</html>