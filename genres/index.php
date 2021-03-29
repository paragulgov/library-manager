<?php

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
        <a href="../authors/index.php" class="item">Authors</a>
        <a class="item active">Genres</a>
    </div>

    <div class="ui black segment">
        <form action="addGenre.php" method="post" class="ui form">
            <div class="fields">
                <div class="field" style="flex-grow: 1">
                    <label>Genre</label>
                    <input type="text" placeholder="Genre" name="genre">
                </div>
                <button type="submit" class="ui icon button" style="align-self: flex-end; margin-bottom: 2px;">
                    <i class="plus icon"></i>
                </button>
            </div>
        </form>
    </div>

    <table class="ui celled table">
        <thead>
        <tr>
            <th>ID genre</th>
            <th>Genre</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $genres = mysqli_query($connect, query: "SELECT * FROM `genres` ORDER BY `id_genre`");
        $genres = mysqli_fetch_all($genres);
        foreach ($genres as $genre) {
            ?>
            <tr>
                <td><?= $genre[0] ?></td>
                <td><?= $genre[1] ?></td>

                <td>
                    <a href="deleteGenre.php?id=<?= $genre[0] ?>">
                        <div class="ui vertical animated button" tabindex="0">
                            <div class="hidden content">Delete</div>
                            <div class="visible content">
                                <i class="close icon"></i>
                            </div>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="updatePage.php?id=<?= $genre[0] ?>">
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
        ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
</body>
</html>