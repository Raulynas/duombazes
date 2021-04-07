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

    $sql = "SELECT * from `vegetables`";
    return connect()->query($sql);
}

function getByID($id)
{
    $sql = "SELECT * from `vegetables` where id = $id";
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

    $sql = "UPDATE `vegetables` 
    SET `name` = '" . $name . "', `quantity` = '" . $quantity . "', `date` = '" . $date . "' 
    WHERE `vegetables`.`id` = $id;";
    connect()->query($sql);
    header("location:./home.php");
    die;
}

function store($request){
    $name = $request["name"];
    $quantity = $request["quantity"];
    $date = $request["date"];

    $sql = "INSERT INTO `vegetables` (`id`, `name`, `quantity`, `date`)
    VALUES (NULL, '" . $name . "', '" . $quantity . "', '" . $date . "');";

    connect()->query($sql);
    header("location:./home.php");
    die;
}

function destroy(){
    $sql = "DELETE FROM `vegetables` WHERE `vegetables`.`id` = " . $_POST["id"] . "";
    connect()->query($sql);
    header("location:./home.php");
    die;
}
