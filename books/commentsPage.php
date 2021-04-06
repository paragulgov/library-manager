<?php
session_start();
require_once '../config/connect.php';

$book_id = $_GET['id'];
$book = mysqli_query($connect, query: "SELECT id_book, title, description, year, authors.full_name, genres.genre FROM `books` JOIN authors ON books.id_author = authors.id_author JOIN genres ON books.id_genre = genres.id_genre WHERE id_book = '$book_id' ORDER BY id_book");
$book = mysqli_fetch_assoc($book);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Manager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
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
        <a href="../queries/index.php" class="item">Filter</a>
    </div>

    <table class="ui celled table">
        <thead>
        <tr>
            <th>ID book</th>
            <th>Title of the book</th>
            <th>Description</th>
            <th>Date write</th>
            <th>Author</th>
            <th>Genre</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td><?= $book['id_book'] ?></td>
            <td><?= $book['title'] ?></td>
            <td><?= $book['description'] ?></td>
            <td><?= $book['year'] ?></td>
            <td><?= $book['full_name'] ?></td>
            <td><?= $book['genre'] ?></td>
        </tr>
        </tbody>
    </table>

    <div class="ui comments">
        <h3 class="ui dividing header">Comments</h3>
        <?php
        $comments = mysqli_query($connect, "SELECT comments.id, text, books.title, users.login FROM `comments` JOIN books ON comments.id_book = books.id_book JOIN users ON comments.id_user = users.id WHERE comments.id_book = '$book_id'");
        while ($comment = mysqli_fetch_array($comments)) {
            ?>
            <div class="comment">
                <a class="avatar">
                    <img src="https://semantic-ui.com/images/avatar/small/matt.jpg">
                </a>
                <div class="content">

                    <a class="author"><?= $comment[3] ?></a>

                    <div class="text">
                        <?= $comment[1] ?>
                    </div>

                </div>
            </div>
            <?php
        }
        if (isset($_SESSION['user'])) {

            ?>

            <form action="addComment.php" method="post" class="ui reply form">
                <input type="hidden" value="<?= $_GET['id'] ?>" name="id_book">
                <div class="field">
                    <textarea name="comment"></textarea>
                </div>
                <button class="ui button">Send</button>
            </form>
            <?php
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
</body>
</html>