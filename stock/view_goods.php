

<?php

    session_start();
    if (isset($_SESSION['user']) && $_SESSION['user']['status'] === 'manager') {
        require_once '../config/connect.php';
        $stock = $_SESSION['user']['stock'];
        $goods = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `goods` WHERE `stock_number` = '$stock'"));

        echo '<pre>';
        print_r($goods);
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
<link rel="stylesheet" type='text/css' href="./css/view.css">
<title>Add new good</title>
</head>
<body>

<table>
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Stock</th>
            <th>Serial number</th>
            <th>Inventory number</th>
            <th>Date</th>
            <th>&#10006</th>
            <th>&#9998</th>
        </tr>
        <?php foreach($goods as $items){
            
        ?>

        <tr>
            <?php
            foreach($items as $item){
            echo '<td>'.$item.'</td>'; }?>
            <td><a href="./vendor/delete.php?id=<?=$items[0]?>">Delete</a></td>
            <td><a href="./update.php?id=<?= $items[0]?>">Update</a></td>
        </tr>
            
        <?php
            }
        ?>
</table>
    <br>
    <a href="./add_good.php">Add new good</a> |
    <a href="./../php_auth/vendor/signout.php" class="logout" style="color: red;">Выход</a> |
    <a href="../transport/transport.php"> Отправить продукта</a> |
    <a href="../transport/monitoring.php"> Monitoring</a>
    
    

</form>
</body>
</html>


