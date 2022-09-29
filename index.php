<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Data Diri</title>
	<style type="text/css">
main {
  padding: 0;
}
header {
  position: sticky;
  top:0;
  bottom: 20;
  padding:10px;
  background: black;
  color: white;
  text-align: center;
}

content > div {
  height: 100px;
}

	</style>
</head>
<body>
	<script type="text/javascript">
		if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
	</script>

<header>
<h1 align="center">Basic Crud</h1>
<form align="center" action="./index.php" method="POST">
	<input type="submit" name="get" value="Get Data" class="btn btn-outline-primary">
	<input type="submit" name="submit" value="Add/Edit" class="btn btn-outline-primary">
</form>
</header>
<content>
<?php
include "config.php";
if (isset($_POST["get"])) {
	echo "<table border='1' align='center'><tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Alamat</th>
		<th>Foto</th>
	</tr>";
	$sql = $conn->query("SELECT * FROM murid");
	while ($row = mysqli_fetch_array($sql)) {
		echo "<tr>";
		echo "<th>".$row[0]."</th>";
		echo "<th>".$row[1]."</th>";
		echo "<th>".$row[2]."</th>";
		echo "<th>".$row[3]."</th>";
		$now = $row[4];
		if($row[4] == NULL){
			$now = "anon";
		}

		echo "<th><img src='./img/".$now.".png' width='100' height='100' onerror='this.onerror=null; this.src='anon.png''></th> ";
		// echo "<th><img src='./img/".$row[4].' width='100' height='100'></th>";
		echo "</tr>";
	}
}
if( isset($_POST["submit"])){
echo '<form method="post" action="./index.php" enctype="multipart/form-data">
	<div class="form-group">
		<label for="nama">Nama</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama Siswa" id="nama">
	</div>
	<div class="form-group">
		<label for="Email">Email</label>
		<input type="Email" name="email" class="form-control" placeholder="Email siswa" id="email">
	</div>
	<div class="form-group">
		<label for="Alamat">Alamat</label>
		<input type="text" name="alamat" class="form-control" placeholder="Alamat siswa" id="alamat">
	</div>
	<div>
		<input type="file" name="image" accept="image/*" />
	</div>
<input type="submit" name="bt" class="btn btn-outline-primary">
</form>';
}
//  if ( isset($_POST["submit"])) {
//  	include 'config.php';
//  	$sql = $conn->query("SELECT * FROM murid");

//  	while($row = mysqli_fetch_array($sql)){

// // 	echo $row[0];
//  }

if (isset($_POST["bt"])) {
	#echo $_POST["nama"];
	$nm = $_POST["nama"];
	$eml = $_POST["email"];
	$almt = $_POST["alamat"];
	#$sql = 'insert into murid(nama) values("erik")';
	
	$sql2 = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'kelas' AND TABLE_NAME = 'murid'";
	$index = $conn->query($sql2)->fetch_row()[0];
	echo $index;
	#$index = 100;
	$sql = "INSERT INTO murid(Nama, email, alamat, foto) VALUES('$nm', '$eml', '$almt', '$index')";
	if (!$conn->query($sql)) {
		die("ewow");
	}
	echo $index;
	$image_file = $_FILES['image'];
	if (!isset($image_file)) {
		die('no fiel uploaded');
	}
	if (!exif_imagetype($image_file["tmp_name"])) {
		#header("Location: ./index.php")
		die("not a picture");
	}

	echo $image_file["tmp_name"];
	move_uploaded_file($image_file["tmp_name"],"./img/" . $index . ".png");
}
#echo $_GET["nama"];
?>
</tr>
</table>
</content>
</body>
</html>
