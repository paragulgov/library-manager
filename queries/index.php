<?php

require_once '../config/connect.php';

if (isset($_GET['id_book'])) {
    $query = "SELECT id_book, title, description, year, authors.full_name, genres.genre FROM `books` JOIN authors ON books.id_author = authors.id_author JOIN genres ON books.id_genre = genres.id_genre ORDER BY id_book";
} elseif (isset($_GET['title'])) {
    $query = "SELECT id_book, title, description, year, authors.full_name, genres.genre FROM `books` JOIN authors ON books.id_author = authors.id_author JOIN genres ON books.id_genre = genres.id_genre ORDER BY title";
} elseif (isset($_GET['description'])) {
    $query = "SELECT id_book, title, description, year, authors.full_name, genres.genre FROM `books` JOIN authors ON books.id_author = authors.id_author JOIN genres ON books.id_genre = genres.id_genre ORDER BY description";
} elseif (isset($_GET['year'])) {
    $query = "SELECT id_book, title, description, year, authors.full_name, genres.genre FROM `books` JOIN authors ON books.id_author = authors.id_author JOIN genres ON books.id_genre = genres.id_genre ORDER BY year";
} elseif (isset($_GET['author'])) {
    $query = "SELECT id_book, title, description, year, authors.full_name, genres.genre FROM `books` JOIN authors ON books.id_author = authors.id_author JOIN genres ON books.id_genre = genres.id_genre ORDER BY full_name";
} elseif (isset($_GET['genre'])) {
    $query = "SELECT id_book, title, description, year, authors.full_name, genres.genre FROM `books` JOIN authors ON books.id_author = authors.id_author JOIN genres ON books.id_genre = genres.id_genre ORDER BY genre";
} else {
    $query = "SELECT id_book, title, description, year, authors.full_name, genres.genre FROM `books` JOIN authors ON books.id_author = authors.id_author JOIN genres ON books.id_genre = genres.id_genre ORDER BY id_book";
}
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
        <a class="item active">Filter</a>
    </div>

    <div class="ui black segment">
        <form action="filter.php" method="post" class="ui form">
            <div class="fields">

                <div class="field">
                    <a href="?id_book=id_book">
                        <div class="ui vertical  button" tabindex="0">
                            <div class="hidden content">ID</div>
                        </div>
                    </a>
                </div>
                <div class="field">
                    <a href="?title=title">
                        <div class="ui vertical  button" tabindex="0">
                            <div class="hidden content">Title</div>
                        </div>
                    </a>
                </div>
                <div class="field">
                    <a href="?description=description">
                        <div class="ui vertical  button" tabindex="0">
                            <div class="hidden content">Description</div>
                        </div>
                    </a>
                </div>
                <div class="field">
                    <a href="?year=year">
                        <div class="ui vertical  button" tabindex="0">
                            <div class="hidden content">Year</div>
                        </div>
                    </a>
                </div>
                <div class="field">
                    <a href="?author=author">
                        <div class="ui vertical  button" tabindex="0">
                            <div class="hidden content">Author</div>
                        </div>
                    </a>
                </div>
                <div class="field">
                    <a href="?genre=genre">
                        <div class="ui vertical  button" tabindex="0">
                            <div class="hidden content">Genre</div>
                        </div>
                    </a>
                </div>

            </div>
        </form>
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
        <?php
        $books = mysqli_query($connect, query: "$query");
        $books = mysqli_fetch_all($books);
        foreach ($books as $book) {
            ?>
            <tr>
                <td><?= $book[0] ?></td>
                <td><?= $book[1] ?></td>
                <td><?= $book[2] ?></td>
                <td><?= $book[3] ?></td>
                <td><?= $book[4] ?></td>
                <td><?= $book[5] ?></td>

            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
</body>
</html>