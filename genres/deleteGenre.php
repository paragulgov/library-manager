<?php

require_once '../config/connect.php';

$id = $_GET['id'];

mysqli_query($connect, query: "DELETE FROM `genres` WHERE `genres`.`id_genre` = '$id'");

header('Location: index.php');