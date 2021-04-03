<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
</head>
<body>
<div class="ui container">


    <form
            action="logIn.php"
            method="post"
            class="ui form error"
            style="display:flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh"
    >
        <div class="field">
            <label>Login</label>
            <input type="text" name="login" placeholder="Enter your login">
        </div>
        <div class="field">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password">
        </div>
        <div class="field">
            <div class="ui">
                <label>
                    <input type="checkbox" tabindex="0" name="remember">
                    Remember me
                </label>
            </div>
        </div>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<div class="ui error small message"><p>' . $_SESSION['message'] . '</p></div>';
        }
        unset($_SESSION['message']);
        ?>
        <button class="ui button" type="submit">Log In</button>
        <div style="margin-top: 25px">
            <a href="register.php">Create account</a>
        </div>
    </form>

</div>
</body>
</html>
