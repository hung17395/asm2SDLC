<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel=" stylesheet" type = "text/css"
href="bootstrap/css/bootsrap.min.css">  
</head>
<body>

<table border="1 solid black">
	        <tr>
		              <th>Song Id</th>
                  <th>Song Name </th>
                  <th>Price </th>
                  <th>Images </th>
                  <th>Genre Name </th>
                  <th>Singer Name </th>
                  <th>Action </th>
          <tr>

                  <?php
                  include("connect.php");
                  $sql = "SELECT * FROM song , singer, genre Where song.genre_id = genre.genre_id and song.singer_id = singer.singer_id";
                  $result = mysqli_query($connect,$sql);
                  while ($row= mysql_fetch_array ($result))
                  $song_id = $row['song_id'];
                  $song_name = $row['song_name'];
                  $song_price = $row['song_price'];
                  $song_image = $row['song_image'];
                  $genre_name = $row['genre_name'];
                  $singer_name = $row['singer_name'];
         
               ?>
          <tr>
                  <td> <?php echo $song_id ?></td>
                  <td> <?php echo $song_name ?></td>
                  <td> <?php echo $song_price ?></td>
                  <td> <img src="Images/<?php echo $song_image ?>" style ="width: 100px;"></td>
                  <td> <?php echo $genre_name ?></td>
                  <td> <?php echo $singer_name ?></td>
                  <td> <a href="editsong.php?id=<?php echo $song_id ?>">Update Song </a></td>
                  <td> <a href="?id=<?php echo $song_id ?>">Delete Song </a></td>
                  </tr>
                  <?php
                  }
                  ?>           
</table>
<?php
if (isset($_GET ["id"]))