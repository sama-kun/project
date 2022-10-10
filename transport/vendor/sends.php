<?php
    session_start();
    require_once '../../config/connect.php';

    $good_id = $_POST['goods'];
    $to_id = $_POST['stock_to'];
    $from_id = $_SESSION['user']['stock'];
    $user_from = $_SESSION['user']['full_name'];
    
    $goods = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `goods` WHERE `id` = '$good_id'"));
    $good = $goods['title'];
    $from_stoc = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `stock` WHERE `id` = '$from_id'"))['adress'];
    $to_stoc = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `stock` WHERE `id` = '$to_id'"))['adress'];


    echo '<pre>';
    print_r($goods);
    print_r($to_stoc);
    print_r($from_stoc);
    echo '</pre>';


    if(mysqli_query($con,"INSERT INTO `transport` (`id`, `product_id`, `from_stock`, `to_stock`, `product_title`, `from_stock_title`, `to_stock_title`, `from_name`, `to_name`, `send_time`, `arrive_time`, `status`) VALUES (NULL, '$good_id', '$from_id', '$to_id', '$good', '$from_stoc', '$to_stoc', '$user_from', NULL, CURRENT_TIMESTAMP, '2022-10-08 22:08:02.000000', 'on_road')")){
        mysqli_query($con,"UPDATE `goods` SET `stock_number` = '0' WHERE `goods`.`id` = '$good_id'");
        $_SESSION['status'] = 'The good is successfull sent!!!';
        header('Location: ../transport.php');
    }else
        echo 'Error';


?>