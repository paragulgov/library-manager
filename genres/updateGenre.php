<?php

require_once '../config/connect.php';

$id = $_POST['id'];
$genre = $_POST['genre'];

mysqli_query($connect, query: "UPDATE `genres` SET `genre` = '$genre' WHERE `genres`.`id_genre` = '$id'");

header('Location: index.php');