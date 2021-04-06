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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $quantity = $_POST["quantity"];
    $date = $_POST["date"];


    $sql = "INSERT INTO `vegetables` (`id`, `name`, `quantity`, `date`)
    VALUES (NULL, '" . $name . "', '" . $quantity . "', '" . $date . "');";

    $result = $conn->query($sql);
    header("location:./home.php");
    die;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="name">
        <input type="text" name="quantity">
        <input type="text" name="date">
        <button type="submit">Save</button>
    </form>

</body>

</html>