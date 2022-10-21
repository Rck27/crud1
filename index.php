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
	function update(id){
		var xml = new XMLHttpRequest();
	}
	function edit(id1){
		let a = document.getElementById('B'+id1).innerHTML;
		document.getElementById('B'+id1).innerHTML = "<input type='text' value='"+a+"'>"; //edit the name as input to be changed
		let val = document.getElementById('B'+id1).value;
		console.log(val);
		document.getElementById('E0').innerHTML = `<button onclick=console.log(val)>kirim</button>`;
		// document.getElementById('D'+id1).onclick = console.log(document.getElementById('D'+id1).value);
		//console.log(a);
	}
	</script>

<header>
<h1 align="center">Basic Crud</h1>
<form align="center" action="./index.php" method="POST">
	<input type="submit" name="Home" value="Home" class="btn btn-outline-primary">
	<input type="submit" name="get" value="Get Data" class="btn btn-outline-primary">
	<input type="submit" name="submit" value="Add" class="btn btn-outline-primary">
	<input type="submit" name="edit" value="Edit" class="btn btn-outline-primary">
</form>

</header>
<content>
<?php
include "config.php";
function show(){
	include "config.php";

		echo "<table border='1' align='center'><tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Alamat</th>
		<th>Foto</th>
	</tr>";
	$sql = $conn->query("SELECT * FROM murid");
	$index = 0;
		while ($row = mysqli_fetch_array($sql)) {
		$now = $row[4];
				if($row[4] == NULL){
			$now = "anon";
		}
		//echo "<tr>";
$now = $row[4];
		echo "<tr><th>$row[0]</th>
		<th id='B$index'>$row[1]</th>
		<th id='C$index'>$row[2]</th>
		<th>$row[3]</th><th><img src='./img/$row[4].png' onerror='this.src=`./img/anon.png`' width='100' height='100'></th>
		<th><button id='D$index' onclick=edit('$index')>Edit</button>
		<button id='E$index'>Delete</button></th></tr>";
		echo"\n";
		$index+=1;

	}
}
function edit($id){

}

if (isset($_POST["get"])) {
	echo '
	<form align="center" action="./index.php" method="POST">
<input type="text" name="pw" placeholder="password" class="form-control" id="pw" > 
	<input type="submit" name="ispw" value="login" class="btn btn-outline-primary">

	</form>
	';
}
if (isset($_POST["ispw"])) {
	if ($_POST[pw] == "admin") {
		show();
	// 	echo "<table border='1' align='center'><tr>
	// 	<th>No.</th>
	// 	<th>Nama</th>
	// 	<th>Email</th>
	// 	<th>Alamat</th>
	// 	<th>Foto</th>
	// 	<th>Action</th>
	// </tr>";
	// $sql = $conn->query("SELECT * FROM murid");
	// while ($row = mysqli_fetch_array($sql)) {
	// 	echo "<tr>";
	// 	echo "<th>".$row[0]."</th>";
	// 	echo "<th>".$row[1]."</th>";
	// 	echo "<th>".$row[2]."</th>";
	// 	echo "<th>".$row[3]."</th>";
	// 	$now = $row[4];
	// 	if($row[4] == NULL){
	// 		$now = "anon";
	// 	}
	// 	echo "<th><img src='./img/".$now.".png' width='100' height='100' onerror='this.onerror=null; this.src='anon.png''></th> ";
	// 	// echo "<th><img src='./img/".$row[4].' width='100' height='100'></th>";
	// 	echo "<th><input type='button' value='edit' onclick='show()'>";
	// 	echo "<input type='button' value='Delete' onclick=''></th>";
	// 	echo "</tr>";
	// }
	} //end if
	else{
		// $name = $_POST['search'];
		// $sql = "SELECT * FROM `murid` WHERE nama=$name";

		echo '
		<form align="center" action="./index.php" method="POST">
		<input type="text" class="form-control" name="search" id="search" placeholder="search for name">
		<input type="submit" name="srch" class="btn btn-outline-primary">
		</form>
		';
	}
}
if (isset($_POST['search'])) {
	if (!$_POST['search']) {
		echo 'tesssss';
	}
	else {
		$empty = true;
		echo "<table border='1' align='center'><tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Alamat</th>
		<th>Foto</th>
		";
		$sql = $conn->query("SELECT * FROM murid where nama='$_POST[search]'");
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
			$empty = false;
		}
		if($empty) {
			echo "string";
		}
		//echo $row[0];
		//$sql = conn->query("SELECT * FROM murid WHERE nama='$_POST[search]");
		//echo $sql;
	}
	//$sql = conn->query("select * from murid where nama='$nm'");
	}
if (isset($_POST["Home"])) {
	show();
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
if (isset($_POST["edit"])) {

}

if (isset($_POST["bt"])) {///upload new data
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
	
	echo $index;
	$image_file = $_FILES['image'];
	if (!isset($image_file)) {
		die('no fiel uploaded');
	}
	if (!exif_imagetype($image_file["tmp_name"])) {
		#header("Location: ./index.php")
		$index = '';
		echo "not a picture";
	}
	if (!$conn->query($sql)) {
		die("ewow");
	}

	echo $image_file["tmp_name"];
	move_uploaded_file($image_file["tmp_name"],"./img/" . $index . ".png");
}
#echo $_GET["nama"];
?>
<!-- <script type="text/javascript">
	function edit(let id){
		console.log("ts");
		console.log(document.getElementById(id).value);
	}
</script> -->
</tr>
</table>
</content>
</body>
</html>
