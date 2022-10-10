<?php

    require_once '../../config/connect.php';
    $id = $_POST['id'];
    $title = $_POST['title'];
    $serial = $_POST['serial'];
    $invent = $_POST['invent'];

    print_r($_POST);

    if(!mysqli_query($con,"UPDATE `goods` SET `title` = '$title', `number` = '$invent', `serial_number` = '$serial' WHERE `goods`.`id` = '$id'")){
        $_SESSION['msg'] = 'Good with this number already exists!!!';
        echo 'Error';
        header("Location:../update.php?id=$id");
    }else{
        header('Location:../view_goods.php');
    }
    

?>