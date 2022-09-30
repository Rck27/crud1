<?php
$server = "localhost";
$username = "root";
$pwd = "";
$dbname = "kelas";
#CREATE TABLE `kelas`.`murid` (`No.` INT(10) NOT NULL AUTO_INCREMENT , `Nama` TEXT NOT NULL , `email` VARCHAR(100) NOT NULL , `alamat` TEXT NOT NULL , `foto` VARCHAR(50) NULL DEFAULT NULL , PRIMARY KEY (`No.`)) ENGINE = InnoDB;

$conn = new mysqli($server, $username, $pwd, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
