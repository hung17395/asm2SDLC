
<?php 
include("connect.php");
session_start();

$id= $_GET["id"];
$sql= "SELECT * FROM music,singer,genre WHERE music.genreID = genre.genreID and music.singerID = singer.singerID and musicID = {$id}";
$result= mysqli_query($connect, $sql);
while($row=mysqli_fetch_assoc($result)){
	$musicID= $row['musicID'];
	$musicName= $row['musicName'];
	$musicAudio= $row['musicAudio'];
	$musicLyric= $row['musicLyric'];
	$musicPrice= $row['musicPrice'];
	$musicImage= $row['musicImage'];
	$singerID= $row['singerID'];
	$genreID= $row['genreID'];
	$singerName=$row['singerName'];
	$genreName=$row['genreName'];
}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<title>Detail</title>
	<style>
		.body-content{
			margin-top: 65px
		}
		.music-img{
			width: 100%;
			height: 300px;

		}
		.music-img img{
			width: 100%;
			height: 100%
		}
		.music-audio{
			background-color: #f1f3f4;

		}
		.music-audio audio{
			width: 100%;
		}
		/* add to card */
		.btn-addtocard{
			margin-top: 20px;
			margin-bottom: 20px;
		}
		.btn-addtocard a{
			background-color: gray;
			color: #cfcfcf;
			padding: 10px;
			border-radius: 5px;
			text-decoration: none;
		}
		.btn-addtocard a:hover{
			transition: 0.4s;
			background-color: black;
			color: silver;
		}
	</style>
</head>
<body>
	<header>
		<?php include('element/navbar.php') ?>
	</header>
	<div class="body-content">
		<div style="min-height: 700px" class="container">
			<div class="row">
				<div class="col-7 music-box">
					<div class="music-img">
						<img src="image/<?php echo $musicImage ?>" alt="">
					</div>
					<div class="music-audio">
						<audio controls controlsList="nodownload" ontimeupdate="myaudio(this)">
							<source src="audio/<?php echo $musicAudio ?>" type="	audio/mpeg">	
						</audio>
					</div>
				</div>
				<div class="col-5">
					<div class="music-info">
						<div>
							<h5>Name music: <?php echo "$musicName" ?></h5>
							<h5>Singer: <?php echo $singerName ?></h5>
							<h5>Genre: <?php echo $genreName ?></h5>
							<h5>Price: <?php echo $musicPrice ?></h5>

						</div>
						<div class="btn-addtocard">
							<a href="cart.php?id=<?php echo $musicID ?>">Add to card</a>
						</div>
					</div>
				</div>
				<div style="padding-left: 15px" class=" col- 12 music-lyric">
					<div class="music-info">
						<h3>Lyric:</h3>
						<h5><?php echo "$musicLyric" ?></h5>
					</div>
					</div>
			</div>
		</div>
	</div>
	<?php include('element/footer.php') ?>
	<script type="text/javascript">
		function myaudio(event){
			if(event.currentTime>5){
				event.currentTime=0;
				event.pause();
				alert("You have to pay to listen to the whole music");
			}
		}
	</script>
</body>
</html>