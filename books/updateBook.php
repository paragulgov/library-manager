<?php

require_once '../config/connect.php';

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$year = $_POST['year'];
$author = $_POST['author'];
$genre = $_POST['genre'];

mysqli_query($connect, query: "UPDATE `books` SET `title` = '$title', `description` = '$description', `year` = '$year', `id_author` = '$author', `id_genre` = '$genre' WHERE `books`.`id_book` = '$id'");

header('Location: /');