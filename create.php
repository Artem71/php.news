<?php
require_once 'connection.php';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) die("Connection dailed: " . mysqli_connect_error());

$upload_dir = './img';

if ($_FILES['img-news']['error'] == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['img-news']['tmp_name'];
    $name = time().'_'.$_FILES['img-news']['name'];
    move_uploaded_file($tmp_name, "$upload_dir/$name");
}

$name = $upload_dir.'/'.$name;

$title = htmlentities(mysqli_real_escape_string($conn, $_POST['title-news']));
$text = htmlentities(mysqli_real_escape_string($conn, $_POST['text-news']));
$date = date('d.m.Y');
$time = date('h:i:s');

$query = "INSERT INTO posts (title, text, img, date, time) VALUES ('$title', '$text', '$name', '$date', '$time')";

$result = mysqli_query($conn, $query);

if(!$result) {
    die("Ошибка " . mysqli_error($conn));
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header("Location: index.php");