<?php
include_once "posts.php";

$host = 'localhost';
$database = 'ailjuhe3_news';
$user = 'ailjuhe3_news';
$password = 't7x6ddd';

$link = mysqli_connect($host, $user, $password, $database)
or die("Error " . mysqli_error($link));

$query = "SELECT * FROM posts";
$result = mysqli_query($link, $query) or die("Error " . mysqli_error($link));

while ($row = mysqli_fetch_assoc($result)) {
    array_push($posts, $row);
}

mysqli_free_result($result);

mysqli_close($link);