<?php
require 'functions.php';

$display = fetch("SELECT * FROM cars");

$searchValue = '';

if (isset($_POST["submit"])) {
    $display = search($_POST);
    $searchValue = $_POST['search'];
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

<body class="bg-secondary text-bg-dark">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" alt="" height="40px">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="add.php">Add Data</a>
                    </li>
                </ul>

                <form class="d-flex" role="search" method="post">
                    <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="search" autocomplete="off" value="<?= $searchValue ?>"/>

                    <button class="btn btn-secondary" type="submit" name="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-sm">
        <?php foreach ($display as $card) : ?>
            <ul class="list-group list-group-horizontal-sm m-2">
                <li class="list-group-item">
                    <img src="img/<?= $card["image"] ?>" alt="img" height="50px">
                </li>

                <li class="list-group-item text-center"><?= $card["model"] ?></li>

                <li class="list-group-item text-center"><?= $card["launchYear"] ?></li>

                <li class="list-group-item text-center"><?= $card["horsepower"] ?>Hp</li>

                <li class="list-group-item text-center"><?= $card["topSpeed"] ?>Km/h</li>

                <li class="list-group-item text-center">$<?= $card["price"] ?></li>

                <li class="list-group-item">
                    <a href="change.php?cars_id=<?= $card["cars_id"] ?>">
                        <button type="button" class="btn btn-warning">Change</button>
                    </a>
                </li>

                <li class="list-group-item">
                    <a href="delete.php?cars_id=<?= $card["cars_id"] ?>">
                        <button type="button" class="btn btn-danger">Delete</button>
                    </a>
                </li>
            </ul>
        <?php endforeach; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>