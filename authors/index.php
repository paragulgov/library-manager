<?php
session_start();
require_once '../config/connect.php';

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
        <a class="item active">Authors</a>
        <a href="../genres/index.php" class="item">Genres</a>
        <a href="../queries/index.php" class="item">Filter</a>

    </div>
    <?php
    if ($_SESSION['user']['role'] === 'admin') {
        ?>
        <div class="ui black segment">
            <form action="addAuthor.php" method="post" class="ui form">
                <div class="fields">
                    <div class="field" style="flex-grow: 1">
                        <label>Full name</label>
                        <input type="text" placeholder="Full name" name="full_name">
                    </div>
                    <div class="field">
                        <label>Date of birth</label>
                        <input type="date" name="date_of_birth">
                    </div>
                    <div class="field">
                        <label>Date of death</label>
                        <input type="date" name="date_of_death">
                    </div>
                    <button type="submit" class="ui icon button" style="align-self: flex-end; margin-bottom: 2px;">
                        <i class="plus icon"></i>
                    </button>
                </div>
            </form>
        </div>
        <?php
    }
    ?>
    <table class="ui celled table">
        <thead>
        <tr>
            <th>ID author</th>
            <th>Full name</th>
            <th>Date of birth</th>
            <th>Date of death</th>
            <?php
            if ($_SESSION['user']['role'] === 'admin') {
                ?>
                <th>Delete</th>
                <th>Edit</th>
                <?php
            }
            ?>
        </tr>
        </thead>
        <tbody>
        <?php
        $authors = mysqli_query($connect, query: "SELECT id_author, full_name, date_of_birth, date_of_death FROM `authors` ORDER BY id_author");
        $authors = mysqli_fetch_all($authors);
        foreach ($authors as $author) {
            ?>
            <tr>
            <td><?= $author[0] ?></td>
            <td><?= $author[1] ?></td>
            <td><?= $author[2] ?></td>
            <td><?= $author[3] ?></td>
            <?php
            if ($_SESSION['user']['role'] === 'admin') {
                ?>
                <td style="text-align: center">
                    <a href="deleteAuthor.php?id=<?= $author[0] ?>">
                        <div class="ui vertical animated button" tabindex="0">
                            <div class="hidden content">Delete</div>
                            <div class="visible content">
                                <i class="close icon"></i>
                            </div>
                        </div>
                    </a>
                </td>
                <td style="text-align: center">
                    <a href="updatePage.php?id=<?= $author[0] ?>">
                        <div class="ui vertical animated button" tabindex="0">
                            <div class="hidden content">Edit</div>
                            <div class="visible content">
                                <i class="edit icon"></i>
                            </div>
                        </div>
                    </a>
                </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
</body>
</html>