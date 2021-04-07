<?php

include("../../Controllers/FruitController.php");

//kadangi i home galima ateiti su POST metodu tik is delete funkcijos galima iskart kviest destroy
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    destroy();
}

// $conn-> querry() funkcija kreiptis is duombaze su $sql stringu
$vegetables = getAll();

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
<?php
include ("../header.php");
?>

    <h2>Vaisiai</h2>
    <div id="sum">
    </div>
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
        $sum = 0;
        // $vegetables->fetch_assoc() grazina kiekviena sekancia eilute...
        while ($row = $vegetables->fetch_assoc()) {
            $sum += $row["quantity"];
            echo '<tr>
            <td>' . $row["id"] . '</td>
            <td>' . $row["name"] . '</td>
            <td>' . $row["quantity"] . '</td>
            <td>' . $row["date"] . '</td>
            <td>
                <a href="./edit.php?id=' . $row['id'] . '">edit</a>
            </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value ="' . $row["id"] . '">
                    <button type="submit">delete</button>
                 </form>
            </td>
           </tr>';
        }
        ?>


    </table>
    <script>
        let overallSum = <?= $sum ?>;
        document.getElementById("sum").innerHTML = overallSum;
    </script>
</body>

</html>