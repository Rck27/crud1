<?php
$server = "localhost";
$username = "root";
$pwd = "";
$dbname = "kelas";


$conn = new mysqli($server, $username, $pwd, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
