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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
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
                        <a class="nav-link active" aria-current="page" href="index.php">log out</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="add.php">Add Data</a>
                    </li>
                </ul>

                <form class="d-flex" role="search" method="post">
                    <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="search" autocomplete="off" value="<?= $searchValue ?>" />

                    <button class="btn btn-secondary" type="submit" name="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-sm">
        <table class="table table-striped table-hover table-dark">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>

                    <th scope="col">Image</th>

                    <th scope="col">Model</th>

                    <th scope="col">Launched</th>

                    <th scope="col">Horsepower</th>

                    <th scope="col">Top Speed</th>

                    <th scope="col">Price</th>

                    <th scope="col"></th>

                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                <?php $i = 1;
                foreach ($display as $card) : ?>
                    <tr class="text-center">
                        <th scope="row"><?= $i++ ?></th>

                        <td>
                            <img src="img/<?= $card["image"] ?>" alt="img" height="50px">
                        </td>

                        <td><?= $card["model"] ?></td>

                        <td><?= $card["launchYear"] ?></td>

                        <td><?= $card["horsepower"] ?>hp</td>

                        <td><?= $card["topSpeed"] ?>km/h</td>

                        <td>$<?= $card["price"] ?></td>

                        <td>
                            <a href="change.php?cars_id=<?= $card["cars_id"] ?>">
                                <button type="button" class="btn btn-warning">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                            </a>
                        </td>

                        <td>
                            <a href="delete.php?cars_id=<?= $card["cars_id"] ?>">
                                <button type="button" class="btn btn-danger">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>