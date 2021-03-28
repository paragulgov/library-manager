<?php

require_once '../config/connect.php';

$full_name = $_POST['full_name'];
$date_of_birth = $_POST['date_of_birth'];
$date_of_death = $_POST['date_of_death'];


mysqli_query($connect, query: "INSERT INTO `authors` (`id_author`, `full_name`, `date_of_birth`, `date_of_death`) VALUES (NULL, '$full_name', '$date_of_birth', '$date_of_death')");

header('Location: index.php');