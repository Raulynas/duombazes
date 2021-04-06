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

$sql = "SELECT * from `vegetables` ";

$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <a href="./create.php">sukurti</a>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>quantity</th>
            <th>date</th>
            <th>edit</th>
            <th>delete</th>
        </tr>

        <?php

        while ($row = $result->fetch_assoc()) {
            echo '<tr>
            <td>' . $row["id"] . '</td>
            <td>' . $row["name"] . '</td>
            <td>' . $row["quantity"] . '</td>
            <td>' . $row["date"] . '</td>
            <td>
                <a href="./edit.php?id=' . $row['id'] . '">edit</a>
            </td>
            <td>
                <form action="./delete.php" method="post">
                    <input type="hidden" name="id" value ="' . $row["id"] . '">
                    <button type="submit">delete</button>
                 </form>
            </td>
           </tr>';
        }
        ?>


    </table>


</body>

</html>