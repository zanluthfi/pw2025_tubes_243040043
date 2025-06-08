<?php
require 'functions.php';

$id = $_GET["cars_id"];

$cars = fetch("SELECT * FROM cars WHERE cars_id = $id")[0];

$model = htmlspecialchars($cars["model"]);
$launchYear = htmlspecialchars($cars["launchYear"]);
$horsepower = htmlspecialchars($cars["horsepower"]);
$topSpeed = htmlspecialchars($cars["topSpeed"]);
$price = htmlspecialchars($cars["price"]);
$image = $cars["image"];

if (isset($_POST["submit"])) {

    if (change($_POST) >= 0) {
        echo "
            <script>
                alert('succeed');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('failed');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change</title>
</head>

<body>
    <h1>Change Data</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?= $id ?>" name="id">
        <input type="hidden" value="<?= $image ?>" name="oldImage">
        <ul>
            <li>
                <label for="model">Model :</label>
                <input type="text" name="model" id="model" value="<?= $model ?>" autocomplete="off" require>
            </li>
            <li>
                <label for="launchYear">Launch Year :</label>
                <input type="text" name="launchYear" id="launchYear" value="<?= $launchYear ?>" autocomplete="off" require>
            </li>
            <li>
                <label for="horsepower">Horsepower :</label>
                <input type="text" name="horsepower" id="horsepower" value="<?= $horsepower ?>" autocomplete="off" require>
            </li>
            <li>
                <label for="topSpeed">Top Speed :</label>
                <input type="text" name="topSpeed" id="topSpeed" value="<?= $topSpeed ?>" autocomplete="off" require>
            </li>
            <li>
                <label for="price">Price :</label>
                <input type="text" name="price" id="price" value="<?= $price ?>" autocomplete="off" require>
            </li>
            <li>
                <label for="image">image :</label>
                <img src="img/<?= $image ?>" alt="">
                <input type="file" name="image" id="image" >
            </li>
            <li>
                <button type="submit" name="submit">change Data</button>
            </li>
        </ul>
    </form>

</html>