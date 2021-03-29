<?php

require_once '../config/connect.php';

$genre = $_POST['genre'];

mysqli_query($connect, query: "INSERT INTO `genres` (`id_genre`, `genre`) VALUES (NULL, '$genre')");

header('Location: index.php');