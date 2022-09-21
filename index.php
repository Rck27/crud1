<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Data Diri</title>
</head>
<body>
	<script type="text/javascript">
		if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
	</script>

<h1 align="center">Basic Crud</h1>
<hr>
<form align="center" action="./index.php" method="POST">
	<input type="submit" name="get" value="Get Data" class="btn btn-outline-primary">
	<input type="submit" name="submit" value="Add/Edit" class="btn btn-outline-primary">
</form>
<hr>


<?php
include "config.php";
if (isset($_POST["get"])) {
	echo "<table border='1'><tr>
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
		echo "<th>".$row[4]."</th>";
		echo "</tr>";
	}
}
if( isset($_POST["submit"])){
echo '<form method="post" action="./index.php">
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
	$sql = "INSERT INTO murid(Nama, email, alamat) VALUES('$nm', '$eml', '$almt')";
	if (!$conn->query($sql)) {
		echo "failed";
	}
}
#echo $_GET["nama"];
?>
</tr>
</table>
</body>
</html>
