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
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="" height="40px">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="add.php">Add Data</a>
                    </li>
                </ul>

                <form class="d-flex" role="search" method="post">
                    <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="search" autocomplete="off" />

                    <button class="btn btn-secondary" type="submit" name="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="bg-black text-dark-emphasis">


        <!-- <nav class="navbar bg-body-tertiary border-bottom" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand">Ferrari</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                </ul>
            </div>

            <form class="d-flex" action="" method="post">
                <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="search" autocomplete="off" />
                <button class="btn btn-secondary" type="submit" name="submit">Search</button>
            </form>
        </div>
    </nav> -->


        <!-- <a href="add.php">add data</a> -->


        <div class="row row-cols-1 row-cols-md-3 g-0">
            <?php foreach ($display as $card) : ?>
                <div class="col">
                    <div class="card text-bg-dark border-secondary">
                        <img src="img/<?= $card["image"] ?>" class="card-img-top img-fluid" alt="">

                        <div class="card-body">
                            <h5 class="card-title"><?= $card["model"] ?></h5>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="border-secondary list-group-item text-bg-dark">Launch Year : <?= $card["launchYear"] ?></li>

                            <li class="border-secondary list-group-item text-bg-dark">Horsepower : <?= $card["horsepower"] ?>Hp</li>

                            <li class="border-secondary list-group-item text-bg-dark">Top Speed : <?= $card["topSpeed"] ?>Km/h</li>

                            <li class="border-secondary list-group-item text-bg-dark">price : $<?= $card["price"] ?></li>

                            <li class="border-secondary list-group-item text-bg-dark">
                                <a href="change.php?cars_id=<?= $card["cars_id"] ?>">
                                    <button type="button" class="btn btn-warning">Change</button>
                                </a>

                                <a href="delete.php?cars_id=<?= $card["cars_id"] ?>">
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>