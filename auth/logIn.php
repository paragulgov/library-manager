<?php

session_start();
require_once '../config/connect.php';

$login = $_POST['login'];
$password = md5($_POST['password']);

$check_user = mysqli_query($connect, query: "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

if (mysqli_num_rows($check_user) > 0) {
//    if (isset($_POST['remember'])) {
//        setcookie("login", $login, time() + (3600 * 200));
//    } else {
//        setcookie("login", $login, 0);
//    }

    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user'] = [
        "id" => $user['id'],
        "login" => $user['login'],
        "email" => $user['email'],
        "role" => $user['role']
    ];

//    if ($user['role'] === 'admin') {
//        setcookie("role", 'admin', time() + (3600 * 200));
//    }
// elseif ($user['role'] === 'user') {
//        setcookie("role", 'user', time() + (3600 * 200));
//    } else {
//        setcookie("role", 'guest');
//    }

    header('Location: ../index.php');
} else {
    $_SESSION['message'] = 'Username or password is incorrect';
    header('Location: auth.php');
}