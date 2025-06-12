<?php
require 'functions.php';

if (isset($_POST["submit"])) {
    if (add($_POST) > 0) {
        echo "
            <script>
                alert('succeed');
                document.location.href = 'dashboard.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('failed');
                document.location.href = 'dashboard.php';
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
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-sm bg-dark p-5">
        <h1>Add Data</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" name="model" id="model" require>
            </div>

            <div class="mb-3">
                <label for="launchYear" class="form-label">Launch Year</label>
                <input type="number" class="form-control" name="launchYear" id="launchYear" require>
            </div>

            <div class="mb-3">
                <label for="horsepower" class="form-label">Horsepower</label>
                <input type="number" class="form-control" name="horsepower" id="horsepower" require>
            </div>

            <div class="mb-3">
                <label for="topSpeed" class="form-label">Top Speed</label>
                <input type="number" class="form-control" name="topSpeed" id="topSpeed" require>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" id="price" require>
            </div>

            <div class="mb-3">
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" name="image" id="image" require>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>