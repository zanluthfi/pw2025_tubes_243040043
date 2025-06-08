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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>