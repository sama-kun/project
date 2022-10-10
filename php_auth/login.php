<?php
    session_start();
     
    if(isset($_SESSION['user'])){
        $status = $_SESSION['user']['status'];
        if($status === 'admin')
            header('Location:../admin/admin.php');
        else 
            header('Location:../stock/view_goods.php');
    }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='style.css'>
    <title>Document</title>
</head>
<body>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<!-- Форма авторизации -->


    <form action="./vendor/signin.php" method="post">
        <label>Логин</label>
        <input type="mail" name="login" placeholder="Enter your login">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Enter your password">
        <button type="submit">Log in</button>

        <p>
            У вас нет аккаунта? - <a href="./register.php">зарегистрируйтесь</a>!
        </p>
        <?php
            //echo md5('123456');
            if(isset($_SESSION['msg'])){
                echo '<p class="msg">'. $_SESSION['msg'] . '</p>';
            }
            unset($_SESSION['msg']);
        ?>
    </form>

</body>
</html>
</body>
</html>