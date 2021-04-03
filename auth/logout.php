<?php
session_start();
unset($_SESSION['user']);
//setcookie("login", "", 0);
//setcookie("role", "", 0);
header('Location: /');