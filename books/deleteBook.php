<?php

require_once '../config/connect.php';

$id = $_GET['id'];

mysqli_query($connect, query: "DELETE FROM `books` WHERE `books`.`id_book` = '$id'");

header('Location: /');