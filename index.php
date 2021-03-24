<?php

require_once 'connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab 2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
</head>
<body>

<div class="ui container">
    <div class="ui stackable menu">
        <div class="item">
            <img src="https://de.donstu.ru/CDOSite/Conf/images/dstu.jpg">
        </div>
        <a class="item">Features</a>
        <a class="item">Testimonials</a>
        <a class="item active">Sign-in</a>
    </div>
    <div class="ui black segment">
        <div class="ui form">
            <div class="fields">
                <div class="field">
                    <label>Title</label>
                    <input type="text" placeholder="Title">
                </div>
                <div class="field">
                    <label>Description</label>
                    <input type="text" placeholder="Description">
                </div>
                <div class="field">
                    <label>Year</label>
                    <input type="text" maxlength="4" placeholder="Year">
                </div>

                <div class="ui form">
                    <div class="field">
                        <label>Genre</label>
                        <select>
                            <option value="">Choose a genre</option>
                            <option value="1">Сказка</option>
                            <option value="0">Драма</option>
                        </select>
                    </div>
                </div>

                <div class="field">
                    <label>Author</label>
                    <select>
                        <option value="">Choose author</option>
                        <option value="1">Лев Николаевич Толстой</option>
                        <option value="0">Ствен Кинг</option>
                    </select>
                </div>

                <div class="ui animated button" tabindex="0" style="align-self: flex-end; margin-bottom: 2px;">
                    <div class="visible content">Add</div>
                    <div class="hidden content">
                        <i class="check icon"></i>
                    </div>
                </div>

            </div>
        </div>
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
            <th>Delete</th>
            <th>Edit</th>
            <th>Comments</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $products = mysqli_query($connect, query: "SELECT id_book, title, description, year, authors.full_name, genres.genre FROM `books` JOIN authors ON books.id_author = authors.id_author JOIN genres ON books.id_genre = genres.id_genre");
        $products = mysqli_fetch_all($products);
        foreach ($products as $product) {
            ?>
            <tr>
                <td><?= $product[0] ?></td>
                <td><?= $product[1] ?></td>
                <td><?= $product[2] ?></td>
                <td><?= $product[3] ?></td>
                <td><?= $product[4] ?></td>
                <td><?= $product[5] ?></td>
                <td>
                    <button class="ui icon button">
                        <i class="close icon"></i>
                    </button>
                </td>
                <td>
                    <button class="ui icon button">
                        <i class="edit icon"></i>
                    </button>
                </td>
                <td>Comment</td>
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