<?php

require_once '../config/connect.php';

$title = $_POST['title'];
$description = $_POST['description'];
$year = $_POST['year'];
$author = $_POST['author'];
$genre = $_POST['genre'];

mysqli_query($connect, query: "INSERT INTO `books` (`id_book`, `title`, `description`, `year`, `id_author`, `id_genre`) VALUES (NULL, '$title', '$description', '$year', '$author', '$genre')");

header('Location: /');