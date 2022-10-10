<?php

    session_start();
    require_once '../../config/connect.php';

    $date = date("Y-m-d H:i:s");


    $id = $_GET['id'];
    $stock_id = $_SESSION['user']['stock'];
    $name = $_SESSION['user']['full_name'];
    echo $id;
    echo $stock_id;
    echo $name;

    $trans = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `transport` WHERE `id` = '$id'"));

    echo '<pre>';
    print_r($trans);
    echo "</pre>";
    $good_id = $trans['product_id'];

    mysqli_query($con,"UPDATE `goods` SET `stock_number` = '$stock_id' WHERE `goods`.`id` = '$good_id'");
    mysqli_query($con,"UPDATE `transport` SET `to_name` = '$name' WHERE `transport`.`id` = '$id'");
    mysqli_query($con,"UPDATE `transport` SET `status` = 'arrived' WHERE `transport`.`id` = '$id'");
    mysqli_query($con,"UPDATE `transport` SET `arrive_time` = '$date' WHERE `transport`.`id` = '$id'");
    header('Location: ../monitoring.php');
?>