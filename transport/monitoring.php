<?php

    session_start();
    require_once '../config/connect.php';
    if (!$_SESSION['user']) {
        header('Location: ../php_auth/login.php');
    }
    $stock = $_SESSION['user']['stock'];
    $onroad = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `transport` WHERE `from_stock` = '$stock' AND `status` = 'on_road'"));
    $coming = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `transport` WHERE `to_stock` = '$stock' AND `status` = 'on_road'"));
    $goods = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `goods`"));
    // WHERE `from_stock` = '$stock'

    echo '<pre>';
    print_r($_SESSION['user']);
    print_r($onroad);
    //print_r($goods);
    echo '<hr>';
    print_r($coming);
    echo '</pre>';
?>



<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Monitoring</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    <h2>Sends</h2>
<table>
        <tr>
            <th>id</th>
            <th>Inventory id</th>
            <th>Product title</th>
            <th>From</th>
            <th>Go to</th>
            <th>User send</th>
            <th>Send time</th>
            <th>Status</th>
            
        </tr>
        <?php foreach($onroad as $items){

            
        ?>

        <tr>
            <?php
            for($i = 0;$i<count($items);$i++){
                if($i == 2 || $i == 3 || $i == 8 || $i == 10)
                    continue;
                else 
                    echo '<td>'.$items[$i].'</td>'; 
            
            }?>
            
        </tr>
            
        <?php
            }
        ?>
</table>

<hr>

<h2>Products are coming</h2>
<table>
        <tr>
        <th>id</th>
            <th>Inventory id</th>
            <th>Product title</th>
            <th>From</th>
            <th>Go to</th>
            <th>User send</th>
            <th>Send time</th>
            <th>Status</th>
            <th>Confirm</th>
            
        </tr>
        <?php foreach($coming as $items){
            
        ?>

        <tr>
        <?php
            for($i = 0;$i<count($items);$i++){
                if($i == 2 || $i == 3 || $i == 8 || $i == 10)
                    continue;
                else {
                    echo '<td>'.$items[$i].'</td>'; 
                    // echo '<a href="./vendor/confirm.php?id=' . $items[0] . '">Confirm</a>';
                }
                
            
            }?>
            <td><a href="./vendor/confirm.php?id=<?=$items[0]?>">Confirm</a></td> 
            
        </tr>
            
        <?php
            }
        ?>
</table>
<a href="../stock/view_goods.php">Back</a>


</body>
</html>




