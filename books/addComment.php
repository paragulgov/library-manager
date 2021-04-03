<?php
session_start();
require_once '../config/connect.php';

$comment = $_POST['comment'];
$id_book = $_POST['id_book'];
$id_user = $_SESSION['user']['id'];
mysqli_query($connect, "INSERT INTO `comments` (`id`, `text`, `id_book`, `id_user`) VALUES (NULL, '$comment', '$id_book', '$id_user')");

header("Location: {$_SERVER['HTTP_REFERER']}");