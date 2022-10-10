<?php

    session_start();
    require_once '../config/connect.php';
    if(!isset($_SESSION['user']) || !($_SESSION['user']['status'] === 'admin')){
        
            header('Location:../php_auth/login.php');
        
            //header('Location:../stock/view_goods.php');
    }


    //$stocks = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `stock`"));
    //$stocks = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `stock`"));
    // echo '<pre>';
    // print_r($stocks);
    // echo '</pre>';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" type='text/css' href="../php_auth/style.css">

</head>
<body>

    <!-- Форма регистрации -->

    <form action="../php_auth/vendor/register.php" method="POST">
        <label>Full name</label>
        <input type="text" name="full_name" placeholder="Enter your full name">
        <label>Login</label>
        <input type="text" name="login" placeholder="Enter your login">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email">
        <!-- <label>Dowmload your picture</label>
        <input type="file" name="avatar" size=""/> -->
        <label>Password</label>
        <input type="password" name="pass" placeholder="Enter you password">
        <label>Confirm your password</label>
        <input type="password" name="pass_confirm" placeholder="Confirm your password">
        <input type="hidden" value="admin" name="status" />
        <input type="hidden" value="NULL" name="stock" />

        <button type="submit">Login</button>

        <!-- <p>
            You already have an account? - <a href="./login.php">log in</a>!
        </p> -->
        <?php
            
            if(isset($_SESSION['msg'])){
                if($_SESSION['msg'] === 'You have successfully registered!!!')
                    unset($_SESSION['msg']);
                else
                    echo '<p class="msg">'. $_SESSION['msg'] . '</p>';
            }
            unset($_SESSION['msg']);
        ?>
    </form>

</body>
</html>