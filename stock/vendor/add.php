<?php
    session_start();

    require_once '../../config/connect.php';
    $date = date("YmdHis");

    $title = $_POST['title'];
    $serial = $_POST['serial'];
    $invent = $_POST['invent'];
    $stock = $_SESSION['user']['stock'];

   if(!mysqli_query($con,"INSERT INTO `goods` (`id`, `title`, `number`, `serial_number`, `stock_number`, `date`) VALUES (NULL, '$title', '$invent', '$serial', '$stock', '$date')")){
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    $_SESSION['msg'] = 'Good with this number already exists!!!';
    header('Location:../add_good.php');
   }else{
    $_SESSION['msg'] = 'The good successfully added!!!';
    header('Location:../add_good.php');
   }
   
    


    

?>