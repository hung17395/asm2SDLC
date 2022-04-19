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
		.card-music{
			
			width: 100%;
			height: auto;
			padding-left: 0px
		}
		.box-music:hover{
			background: linear-gradient(to right top,#f5f5f5,gray);
			box-shadow: 4px 2px 8px silver;
			/* margin-left: 5px;
			margin-right: 5px; */
			transition: 0.4s;
		}

		.card-music .box-music  .image-music{
			width: 160px;
			height: 160px;

		}
		.card-music .box-music  .image-music .color-left{
			position: absolute;
			width: 160px;
			margin-top: 106px;
			height: 54px;
			border-bottom-left-radius: 10px;
			background-color: #F1F3F4;
			z-index: ;
			

		}
		.card-music .box-music  .image-music img{
			display: block;
			width: 140px;
			height: 140px;
			margin: 10px 10px;
			position: relative;
		}
		.box-info{
			width: 100%;
			height: 100%;

		}
		.box-info .info-music{
			margin-top: 20px;
			width: 100%;
			height: 86px;		
		}
		.box-info .info-music a{
			text-decoration: none;
			color: black;
		}
		.box-info .audio-file{
			bottom: 0px;
			height: 54px;

		}
		.box-info .audio-file audio{
			width: 100%;
			bottom: 0px;
			border: none;
			background: none;
			outline: none;
			background-color: #F1F3F4;
			border-bottom-right-radius: 10px;
			/* background: #f5f5f5; */
		}
		/* the top music */
		.top-music{

			height: auto;
			padding-top: 20px;
			
		}
		.group-box {
			
			width: 100%;
			height: 200px;
			background-color: #F1F3F4;
			
			width: 100%;
			/* padding-left: 10px; */
			border-radius: 20px;
		}
		.top-music .title-topms{
			text-align: center;
			padding-top: 10px;
		}
		.top-music .title-topms a{
			text-transform: uppercase;
			text-decoration: none;
			color: black;
		}
		.top-music .title-topms:hover a{
			color: gray;
		}
		.top-music .title-topms a i{
			font-size: 30px;
		}
		.box-topmusic{
			width: 100%;
			height: 50px;
			display: flex;
			margin-top: 20px;
			margin-left: 5px;
		}
		.box-topmusic .imager-trmusic{
			width: 50px;
			height: 100%;
		}
		.box-topmusic .imager-trmusic img{
			width: 100%;
			height: 100%;
			border-radius: 50%;
		}
		.box-topmusic .info-trmusic{
			display: flex;
			margin-top: auto;
			margin-bottom: auto;
			margin-left: 15px;
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
			<h1>All musics</h1>
		</div>
	</div>
	<div style="padding-bottom: 30px" class=" container">
		<div class="row">
			<div class="col-9 list-music">
				<div class="gird-box">
					<div class="row">
						<?php include('connect.php') ?>
						<?php 
						$sql = "select * from music INNER JOIN singer on music.singerID = singer.singerID";
						$result = mysqli_query($connect,$sql);
							//tra ket qua 1 mang
						while($row=mysqli_fetch_assoc($result)){
							$musicID= $row['musicID'];
							$musicName= $row['musicName'];
							$musicAudio= $row['musicAudio'];
							$musicLyric= $row['musicLyric'];
							$musicPrice= $row['musicPrice'];
							$musicImage= $row['musicImage'];
							$singerID= $row['singerID'];
							$categoryID= $row['genreID'];
							$singerName= $row['singerName'];
							?>
							<div class='card-music col-4'>
								<div class=' box-music'>

									<div class='image-music'>
										<div class='color-left'></div>
										<img src='image/<?php echo $musicImage ?>' alt=''>
									</div>
									<div class='box-info'>
										<div class='info-music'>
											<a href='detail.php?id=<?php echo $musicID ?>' ><h5><?php echo $musicName ?></h5></a>
											<a href=''><h7><?php echo $singerName ?></h7></a>
										</div>
										<div class='audio-file'>
											<audio controls controlsList="nodownload" ontimeupdate="myaudio(this)"><source src="audio/<?php echo $musicAudio ?>" type="audio/mpeg">

											</audio>

										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						
					</div>
					
					
				</div>
			</div>
			<div class="col-3 top-music">
				<div class="group-box">
					<div class="title-topms">
						<a style="font-weight: bold" href="">Trending</a>
					</div>
					<div class="box-topmusic">
						
						<div class="imager-trmusic">
							<img src="image/trending/thunder.jpg
							" alt="">
						</div>
						<div class="info-trmusic">
							<h6>Thunder</h6>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</div>
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
	<footer>
		<?php include("element/footer.php"); ?>
	</footer>
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