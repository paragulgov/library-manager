<?php
require_once '../config/connect.php';

$book_id = $_GET['id'];
$book = mysqli_query($connect, query: "SELECT * FROM `books` WHERE `id_book` = '$book_id'");
$book = mysqli_fetch_assoc($book);
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
        <form action="updateBook.php" method="post" class="ui form">
            <input type="hidden" value="<?= $book['id_book'] ?>" name="id">
            <div class="three fields">
                <div class="field">
                    <label>Title</label>
                    <input type="text" name="title" placeholder="Title" value="<?= $book['title'] ?>">
                </div>
                <div class="field">
                    <label>Description</label>
                    <input type="text" name="description" placeholder="Description" value="<?= $book['description'] ?>">
                </div>
                <div class="field">
                    <label>Year</label>
                    <input type="text" name="year" placeholder="Year" value="<?= $book['year'] ?>">
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label>Genre</label>
                    <select name="genre">
                        <?php
                        $genres = mysqli_query($connect, query: "SELECT * FROM `genres`");
                        while ($genre = mysqli_fetch_array($genres)) {
                            if ($genre[0] === $book['id_genre']) {
                                echo '<option selected value="' . $genre[0] . '">' . $genre[1] . '</option>';
                            } else {
                                echo '<option value="' . $genre[0] . '">' . $genre[1] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="field">
                    <label>Author</label>
                    <select name="author">
                        <?php
                        $authors = mysqli_query($connect, query: "SELECT * FROM `authors`");
                        while ($author = mysqli_fetch_array($authors)) {
                            if ($author[0] === $book['id_author']) {
                                echo '<option selected value="' . $author[0] . '">' . $author[1] . '</option>';
                            } else {
                                echo '<option value="' . $author[0] . '">' . $author[1] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <button class="ui button" type="submit">Update</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
</body>
</html>

