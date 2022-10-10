<?php

    require_once '../../config/connect.php';
    $id = $_GET['id'];

    mysqli_query($con,"DELETE FROM `goods` WHERE `goods`.`id` = '$id'");
    header('Location: ../view_goods.php');

?>