<?php

    session_start();
    if (isset($_SESSION['user']) && $_SESSION['user']['status'] === 'manager') {
        require_once '../config/connect.php';
        $stock_user = $_SESSION['user']['stock'];
        
        $goods = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `goods` WHERE `stock_number` = '$stock_user'"));
        $stocks = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `stock`"));

        echo '<pre>';
        print_r($goods);
        print_r($stocks);
        echo md5('NULL ' . '2022-10-08 10:04:33.000000');
        echo '</pre>';
    }else {
        header('Location: ../php_auth/login.php');
    }
        

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type='text/css' href="./css/style.css">
<title>Transport</title>
</head>
<body>
    <form method="post" action="./vendor/sends.php">
    <label>Choose the product</label>
    <select name="goods">
    <option disabled selected>Choose</option>
    <?php foreach($goods as $items){
        //print_r($items);
    ?>
        <?php
        // foreach($items as $item){
        // echo '<td>'.$item.'</td>'; 
        echo '
        <option value="' . $items[0] .'">'
        . $items[1] .
        '
        </option>
        ';
        ?>
        
    <?php
        }
        echo md5('admin');
    ?>
    </select>
    <br>
    <label>Choose the stock</label>
    <!-- <input type="hidden" value="<?=$stock_user?>" name="from"/> -->
    <select name="stock_to">
        <option disabled selected>Choose</option>
        <?php
            foreach($stocks as $stock){
                if($stock[0]===$stock_user){
                    continue;
                }
                
                echo '
                <option value="' . $stock[0] .'">'
                . $stock[1] .
                '
                </option>
                ';
            }
        

        ?>
    </select>
    <br>
    <input type="submit" value="Send"/>
    </form>
    <br>
    
    <a href="../stock/view_goods.php" class="logout">Back</a> |
    <?php
        if(isset($_SESSION['status'])){
            echo '<p class="msg">'. $_SESSION['status'] . '</p>';
        }
        unset($_SESSION['status']);

    ?>
    

</form>
</body>
</html>