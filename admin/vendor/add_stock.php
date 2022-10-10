<?php


    require_once '../../config/connect.php';
    $adress = $_POST['adress'];
    $city = $_POST['city'];

    

    if(mysqli_query($con,"INSERT INTO `stock` (`id`, `adress`, `city`) VALUES (NULL, '$adress', '$city')")){
        $_SESSION['msg'] = 'The stock succesfully added';
        header('Location: ../admin.php');
    }else{
        $_SESSION['msg'] = 'Errorь';
        header('Location: ../add_stock.php');
    }


?>