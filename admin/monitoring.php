<?php
    session_start();
    require_once '../config/connect.php';
    if(isset($_SESSION['user']) && $_SESSION['user']['status'] === 'admin')
        echo 'Admin';
    else 
        header('Location: ../php_auth/login.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
    <form action="./sort_data.php" method="POST" enctype="multipart/form-data">
        <label>At</label>
        <input type="date" name="date_at"/>
        <label>Untill</label>
        <input type="date" name="date_untill"/>
        <input type="submit" value="Show"/>
    </form>
    
</body>
</html>
</body>
</html>