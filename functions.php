<?php
$conn = mysqli_connect('localhost', 'root', '', 'database_tubes_pw2025');


// ambil data
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


?>