<?php

require_once '../config/connect.php';

$id = $_POST['id'];
$full_name = $_POST['full_name'];
$date_of_birth = $_POST['date_of_birth'];
$date_of_death = $_POST['date_of_death'];

mysqli_query($connect, query: "UPDATE `authors` SET `full_name` = '$full_name', `date_of_birth` = '$date_of_birth', `date_of_death` = '$date_of_death' WHERE `authors`.`id_author` = '$id'");

header('Location: index.php');