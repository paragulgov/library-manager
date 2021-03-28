<?php
require_once '../config/connect.php';

$author_id = $_GET['id'];
$author = mysqli_query($connect, query: "SELECT * FROM `authors` WHERE `id_author` = '$author_id'");
$author = mysqli_fetch_assoc($author);
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
        <a class="item">Genres</a>
    </div>

    <div class="ui black segment">
        <form action="updateAuthor.php" method="post" class="ui form">
            <input type="hidden" value="<?= $author['id_author'] ?>" name="id">
            <div class="fields">
                <div class="field" style="flex-grow: 1">
                    <label>Full name</label>
                    <input type="text" placeholder="Full name" name="full_name" value="<?= $author['full_name'] ?>">
                </div>
                <div class="field">
                    <label>Date of birth</label>
                    <input type="date" name="date_of_birth" value="<?= $author['date_of_birth'] ?>">
                </div>
                <div class="field">
                    <label>Date of death</label>
                    <input type="date" name="date_of_death" value="<?= $author['date_of_death'] ?>">
                </div>
            </div>
            <button class="ui button" type="submit">Update</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
</body>
</html>

