<?php
include_once "./posts.php";
include_once "./connection.php";

$upload_dir = './img';

if ($_FILES['img-news']['error'] == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['img-news']['tmp_name'];
    $name = time().'_'.$_FILES['img-news']['name'];
    move_uploaded_file($tmp_name, "$upload_dir/$name");
}

$news['title'] = trim($_POST['title-news']);
$news['text'] = trim($_POST['text-news']);
$news['img'] = $_FILES['img-news']['tmp_name'];
$news['date'] = date('d.m.Y');
$news['time'] = date('h:i:s');

array_push($posts, $news);

/*foreach($_SERVER as $k => $v) {
    echo "$k => $v <br />";
}*/

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqi_error($link));

$query = "INSERT INTO ailjuhe3_news.posts (title, text, img, date-create, time-create)
              VALUES($news)";

$result = mysqi_query($link, $query) or die("Ошибка " . mysqi_error($link));

if($result) echo "Все прошло гуд";

mysqi_close($link);

header('HTTP/1.1 200 OK');
header('Location: http://'.$_SERVER['HTTP_HOST'].'/index.php');



