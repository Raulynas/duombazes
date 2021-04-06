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
    $id = $_POST["id"];
    $name = $_POST["name"];
    $quantity = $_POST["quantity"];
    $date = $_POST["date"];


    $sql = "UPDATE `vegetables` 
    SET `name` = '".$name. "', `quantity` = '" . $quantity . "', `date` = '" . $date . "' 
    WHERE `vegetables`.`id` = $id;";

    $result = $conn->query($sql);
    header("location:./home.php");
    die;
}


$id = $_GET["id"];



$sql = "SELECT * from `vegetables` where id = $id";

$result = $conn->query($sql);

$vegetable = "";
while ($row = $result->fetch_assoc()) {
    $vegetable = $row;
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
    <form action="" method="POST">

        <input type="text" name="name" value=<?= $vegetable['name'] ?>>
        <input type="text" name="quantity" value=<?= $vegetable['quantity'] ?>>
        <input type="text" name="date" value=<?= $vegetable['date'] ?>>
        <input type="hidden" name="id" value=<?= $id ?>>
        <button type="submit">Save</button>

    </form>

</body>

</html>