<?php
    session_start();
    if(isset($_SESSION['user']) && $_SESSION['user']['status'] === 'admin')
        echo '';
    else 
        header('Location: ../php_auth/login.php');

    

?>



<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Page Title</title>
    <link rel="stylesheet" href="../php_auth//style.css" />
</head>
<body>
<form action="./vendor/add_stock.php" method="post">
        <br>
        
        <label>Adress</label>
        <input type="text" name="adress" placeholdger="Enter adress" maxlength="50" />
        <label>City</label>
        <input type="text" name="city" placeholdger="Enter city" maxlength="50" />
        <input type="submit" value="Add"/>
        <a href="./admin.php">Back</a>
        <?php
            if(isset($_SESSION['msg'])){
                echo '<p class="msg">' . $_SESSION['msg'] . ' </p>';
            }
            unset($_SESSION['msg']);

        ?>
    </form>
</body>
</html>


