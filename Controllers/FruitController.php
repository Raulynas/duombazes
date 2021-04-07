<?php

function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kioskas";

    // sukuriamas kintamasis (objektas) kuris atsakingas uz bendravima su duombaze
    $conn =  new mysqli($servername, $username, $password, $dbname);

    // patikrinimas as connection pavyko
    if ($conn->connect_error) {
        echo "connection failed";
        die;
    }

    return $conn;
}

function getAll()
{

    $sql = "SELECT * from `fruit`";
    return connect()->query($sql);
}

function getByID($id)
{
    $sql = "SELECT * from `fruit` where id = $id";
    $result = connect()->query($sql);
    $vegetable = "";
    while ($row = $result->fetch_assoc()) {
        $vegetable = $row;
    }
    return $vegetable;
}
 
function update($request){
    $id = $request["id"];
    $name = $request["name"];
    $quantity = $request["quantity"];
    $date = $request["date"];

    $sql = "UPDATE `fruit` 
    SET `name` = '" . $name . "', `quantity` = '" . $quantity . "', `date` = '" . $date . "' 
    WHERE `fruit`.`id` = $id;";
    connect()->query($sql);
    header("location:./home.php");
    die;
}

function store($request){
    $name = $request["name"];
    $quantity = $request["quantity"];
    $date = $request["date"];

    $sql = "INSERT INTO `fruit` (`id`, `name`, `quantity`, `date`)
    VALUES (NULL, '" . $name . "', '" . $quantity . "', '" . $date . "');";

    connect()->query($sql);
    header("location:./home.php");
    die;
}

function destroy(){
    $sql = "DELETE FROM `fruit` WHERE `fruit`.`id` = " . $_POST["id"] . "";
    connect()->query($sql);
    header("location:./home.php");
    die;
}
