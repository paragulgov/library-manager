<?php

require_once '../config/connect.php';

$id = $_GET['id'];

mysqli_query($connect, query: "DELETE FROM `authors` WHERE `authors`.`id_author` = '$id'");

header('Location: index.php');