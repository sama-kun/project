<?php
    session_start();
    require_once './../../config/connect.php';

    // $sub = [
    //     'manager',
    //     'admin'
    // ];

    $name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass_con = $_POST['pass_confirm'];
    $status = $_POST['status'];
    $stock = $_POST['stock'];

    //$file = $_FILES['avatar'];
    echo '<pre>';
    print_r($_POST);
    echo $status;
    echo '</pre>';

    
    
    
    

    if($pass === $pass_con){
        $pass = md5($pass);
        //$path = 'upload/' . time() . $file['name'];
        if($status === 'admin'){
            if(!mysqli_query($con,"INSERT INTO `user` (`id`, `full_name`, `login`, `email`, `password`, `status`, `stock`) VALUES (NULL, '$name', '$login', '$email', '$pass', '$status', NULL)")){
                $_SESSION['msg'] = 'This mail is already registered!!!';
                echo 'This mail is already registered!!!';
                header('Location: ../register.php');
            }else{
                $_SESSION['msg'] = 'You have successfully registered!!!';
                echo 'You have successfully registered!!!';
                header('Location: ../login.php');
            }
        }else{
            if(!mysqli_query($con,"INSERT INTO `user` (`id`, `full_name`, `login`, `email`, `password`, `status`, `stock`) VALUES (NULL, '$name', '$login', '$email', '$pass', '$status', '$stock')"))
            {
                $_SESSION['msg'] = 'This mail is already registered!!!';
                echo 'This mail is already registered!!!';
                header('Location: ../register.php');
            }else{
                $_SESSION['msg'] = 'You have successfully registered!!!';
                echo 'You have successfully registered!!!';
                header('Location: ../login.php');
            }
        }
        
    }
    else{
        $_SESSION['msg'] = 'Passwords do not match!!!';
        echo 'Passwords do not match!!!';

        header('Location: ../register.php');
    }
?>