<?php
include("../../Controllers/FruitController.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    update($_POST);
}

$vegetable = getByID($_GET["id"])

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
    <?php
    include("../header.php");
    ?>

    <form action="" method="POST">
        <input type="text" name="name" value=<?= $vegetable['name'] ?>>
        <input type="text" name="quantity" value=<?= $vegetable['quantity'] ?>>
        <input type="text" name="date" value=<?= $vegetable['date'] ?>>
        <input type="hidden" name="id" value=<?= $_GET["id"] ?>>
        <button type="submit">Save</button>

    </form>

</body>

</html>