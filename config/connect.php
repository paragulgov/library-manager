<?php

$connect = mysqli_connect('localhost', 'mysql', 'mysql', 'e_library');

if (!$connect) {
    die ('error connect');
}