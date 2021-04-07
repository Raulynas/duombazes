<?php
include("../../Controllers/VegetableController.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    store($_POST);
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
    <?php
    include("../header.php");
    ?>

    <form action="" method="post">
        <input type="text" name="name">
        <input type="text" name="quantity">
        <input type="text" name="date">
        <button type="submit">Save</button>
    </form>

</body>

</html>