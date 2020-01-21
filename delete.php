<?php
include_once "connection.php";


if(isset($_GET['id'])) {
    $conn = mysqli_connect($host, $user, $password, $database);

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query ="DELETE FROM posts WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("Ошибка " . mysqli_error($conn));
        echo "Error: " . $query . "<br />" . mysqli_error($conn);
    }

    mysqli_close($conn);

    header("Location: index.php");
}