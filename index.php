<?php
require 'functions.php';
$cars = query("SELECT * FROM cars");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferrari</title>
</head>

<body>
    <h1>Cars Data</h1>
    <br><br>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>No</td>
            <td>Model</td>
            <td>Launch Year</td>
            <td>Horsepower</td>
            <td>Top Speed</td>
            <td>Price</td>
            <td>Image</td>
            <td>Action</td>
        </tr>
        <?php $i = 1;
        foreach ($cars as $row) : ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $row["model"] ?></td>
                <td><?= $row["launchYear"] ?></td>
                <td><?= $row["horsepower"] ?></td>
                <td><?= $row["topSpeed"] ?></td>
                <td><?= $row["price"] ?></td>
                <td>
                    <img src="img/<?= $row["image"] ?>" alt="">
                </td>
                <td>
                    <a href="">change</a> | 
                    <a href="">delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>