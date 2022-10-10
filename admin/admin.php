<?php
    session_start();
    require_once '../config/connect.php';
    if(isset($_SESSION['user']) && $_SESSION['user']['status'] === 'admin')
        echo 'Admin';
    else 
        header('Location: ../php_auth/login.php');
    // header('Location: profile.php');
    //$goods = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `goods` WHERE `stock_number` = '$stock'"));
    $stocks = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `stock`"));
    echo '<pre>';
    print_r($stocks);
    echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>

<!-- Форма авторизации -->
<?php 
    $start = '<table>
    <tr>
        <th>id</th>
        <th>Title</th>
        <th>Stock</th>
        <th>Serial number</th>
        <th>Inventory number</th>
        <th>Date</th>
    </tr>';
    foreach($stocks as $stock){

        echo '<h2>' . $stock[0] . '. ' . $stock[1] . ' | ' . $stock[2] . '</h2>';
        $id = $stock[0];
        $goods = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `goods` WHERE `stock_number` = '$id'"));
        echo $start;
        
        foreach($goods as $good){
            echo '<tr>'; 
            foreach($good as $item)
                echo '<td>' . $item . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
            
?>

    <a href="./../php_auth/vendor/signout.php" class="logout">Выход</a> | <a href="./add_admin.php">Register new admin</a> | <a href="./add_stock.php">Add stock</a> | <a href="./monitoring.php">Monitoring</a>

</body>
</html>
</body>
</html>