<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: login.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>

    <!-- Профиль -->

    <form>
        <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
        <h2 style="margin: 10px 0;"><?= $_SESSION['user']['name'] . ' ' .  $_SESSION['user']['ls_name']?></h2>
        <a href="#"><?= $_SESSION['user']['email'] ?></a>
        <a href="./vendor/signout.php" class="logout">Выход</a>
    </form>

</body>
</html>