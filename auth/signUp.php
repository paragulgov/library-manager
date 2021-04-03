<?php

session_start();
require_once '../config/connect.php';

$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$check_user = mysqli_query($connect, query: "SELECT * FROM `users` WHERE `login` = '$login'");

if (mysqli_num_rows($check_user) > 0) {
    $_SESSION['message'] = 'Login is busy';
    header('Location: register.php');
} elseif (!preg_match('/\S*(?=\S{5,100})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $password)) {
    $_SESSION['message'] = 'The password must consist of letters of the Latin alphabet of different cases, numbers, and a length of at least 5 characters';
    header('Location: register.php');
} elseif ($password !== $password_confirm) {
    $_SESSION['message'] = 'Password mismatch';
    header('Location: register.php');
} else {
    $password = md5( $password);
    mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `email`, `password`, `role`) VALUES (NULL, '$login', '$email', '$password', 'user')");
    $_SESSION['message'] = 'Registration completed successfully';
    header('Location: auth.php');
}
