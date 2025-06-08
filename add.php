<?php
require 'functions.php';

if(isset($_POST["submit"])) {
    if(add($_POST) > 0) {
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
    <title>add</title>
</head>

<body>
    <h1>Add Data</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="model">Model :</label>
                <input type="text" name="model" id="model" autocomplete="off" require>
            </li>
            <li>
                <label for="launchYear">Launch Year :</label>
                <input type="number" step="1" min="0" name="launchYear" id="launchYear" autocomplete="off" require>
            </li>
            <li>
                <label for="horsepower">Horsepower :</label>
                <input type="number" step="1" min="0" name="horsepower" id="horsepower" autocomplete="off" require>
            </li>
            <li>
                <label for="topSpeed">Top Speed :</label>
                <input type="number" step="1" min="0" name="topSpeed" id="topSpeed" autocomplete="off" require>
            </li>
            <li>
                <label for="price">Price :</label>
                <input type="number" step="1" min="0" name="price" id="price" autocomplete="off" require>
            </li>
            <li>
                <label for="image">image :</label>
                <input type="file" name="image" id="image" autocomplete="off" require>
            </li>
            <li>
                <button type="submit" name="submit">Add Data</button>
            </li>
        </ul>
    </form>
</body>

</html>