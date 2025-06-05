<?php
require 'functions.php';

$display = fetch("SELECT * FROM cars");

if (isset($_POST["submit"])) {
    $display = search($_POST);
}
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
    <br>
    <a href="add.php">add data</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="search" placeholder="search data here..." autocomplete="off">
        <button type="submit" name="submit">search</button>
    </form>
    <br>
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
        foreach ($display as $row) : ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $row["model"] ?></td>
                <td><?= $row["launchYear"] ?></td>
                <td><?= $row["horsepower"] ?></td>
                <td><?= $row["topSpeed"] ?></td>
                <td><?= $row["price"] ?></td>
                <td>
                    <img src="img/<?= $row["image"] ?>" alt="" height="100px">
                </td>
                <td>
                    <a href="change.php?cars_id=<?= $row["cars_id"] ?>">change</a> |
                    <a href="delete.php?cars_id=<?= $row["cars_id"] ?>" onclick="return confirm('sure?')">delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>