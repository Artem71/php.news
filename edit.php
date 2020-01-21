<?php
include_once "connection.php";

$conn = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($conn));

if(isset($_POST['new-title']) && isset($_POST['new-text']) && isset($_POST['id'])) {
    $id = htmlentities(mysqli_real_escape_string($conn, $_POST['id']));
    $title = htmlentities(mysqli_real_escape_string($conn, $_POST['new-title']));
    $text = htmlentities(mysqli_real_escape_string($conn, $_POST['new-text']));

    $query = "UPDATE posts SET title = '$title', text = '$text' WHERE id = '$id'";

    $result = mysqli_query($conn, $query) or die("Error " . mysqli_error($conn));

    if($result) header("Location: index.php");
}
