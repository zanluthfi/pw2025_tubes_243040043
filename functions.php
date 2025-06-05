<?php
$conn = mysqli_connect('localhost', 'root', '', 'database_tubes_pw2025');

// ambil data
function fetch($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// nambah data
function add($data)
{
    global $conn;

    $model = htmlspecialchars($data["model"]);
    $launchYear = htmlspecialchars($data["launchYear"]);
    $horsepower = htmlspecialchars($data["horsepower"]);
    $topSpeed = htmlspecialchars($data["topSpeed"]);
    $price = htmlspecialchars($data["price"]);

    $image = upload();

    if (!$image) {
        echo "
            <script>
                alert('add data failed');
                document.location.href = 'index.php';
            </script>
        ";
        return false;
    }

    $query = "INSERT INTO `cars` (`cars_id`, `model`, `launchYear`, `horsepower`, `topSpeed`, `price`, `image`)
    VALUES (NULL, '$model', '$launchYear', '$horsepower', '$topSpeed', '$price', '$image')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// hapus data
function delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM `cars` WHERE cars_id = $id");
    return mysqli_affected_rows($conn);
}

// ubah data 
function change($data)
{
    global $conn;

    $id = $data["id"];
    $model = htmlspecialchars($data["model"]);
    $launchYear = htmlspecialchars($data["launchYear"]);
    $horsepower = htmlspecialchars($data["horsepower"]);
    $topSpeed = htmlspecialchars($data["topSpeed"]);
    $price = htmlspecialchars($data["price"]);
    $image = htmlspecialchars($data["image"]);

    $query = "UPDATE `cars`
    SET `model` = '$model', `launchYear` = '$launchYear', `horsepower` = '$horsepower', `topSpeed` = '$topSpeed', `price` = '$price', `image` = '$image'
    WHERE `cars`.`cars_id` = $id";

    mysqli_query($conn, $query);
}

// cari data 
function search($data)
{
    $search = $data['search'];

    $query = "SELECT * FROM cars
    WHERE model LIKE '%$search%' OR
    launchYear LIKE '%$search%' OR
    horsepower LIKE '%$search%' OR
    topSpeed LIKE '%$search%' OR
    price LIKE '%$search%'";

    fetch($query);
}

// upload gambar 
function upload()
{
    $fileName = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp'];
    $error = $_FILES['image']['error'];
    $fileSize = $_FILES['image']['size'];

    // cek value form 
    if ($error === 4) {
        echo "
            <script>
                alert('upload image first');
            </script>
        ";
        return false;
    }

    // cek tipe file yg diup
    $allowed = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExtension));
    if (!in_array($fileExtension, $allowed)) {
        echo "
            <script>
                alert('uploaded file not an image');
            </script>
        ";
        return false;
    }

    // cek ukuran
    if($fileSize > 2 * 1024 * 1024) {
        echo "
            <script>
                alert('uploaded file too large');
            </script>
        ";
        return false;
    }

    // upload 
    move_uploaded_file($tmp, 'img/' . $fileName);

    return $fileName;
}
