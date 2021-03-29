<?php
require_once '../config/connect.php';

$author_id = $_GET['id'];
$genre = mysqli_query($connect, query: "SELECT * FROM `genres` WHERE `id_genre` = '$author_id'");
$genre = mysqli_fetch_assoc($genre);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <title>Library Manager</title>
</head>
<body>
<div class="ui container">
    <div class="ui stackable menu">
        <div class="item">
            <img src="https://de.donstu.ru/CDOSite/Conf/images/dstu.jpg">
        </div>
        <a href="../index.php" class="item">Books</a>
        <a href="../authors/index.php" class="item">Authors</a>
        <a href="../genres/index.php" class="item">Genres</a>
    </div>

    <div class="ui black segment">
        <form action="updateGenre.php" method="post" class="ui form">
            <input type="hidden" value="<?= $genre['id_genre'] ?>" name="id">
            <div class="field" style="flex-grow: 1">
                <label>Genre</label>
                <input type="text" placeholder="Genre" name="genre" value="<?= $genre['genre'] ?>">
            </div>
            <button class="ui button" type="submit">Update</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
</body>
</html>

