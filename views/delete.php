<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kioskas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "connection failed";
    die;
}

$sql = "DELETE FROM `vegetables` WHERE `vegetables`.`id` = ".$_POST["id"]."";

$result = $conn->query($sql);
header("location:./home.php");
die;


?>