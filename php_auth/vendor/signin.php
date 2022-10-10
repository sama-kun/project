<?php

    session_start();
    require_once '../../config/connect.php';

    $login = $_POST['login'];
    $pass = md5($_POST['password']);

    $check = mysqli_query($con,"SELECT * FROM `user` WHERE `login`='$login' AND `password` = '$pass'");
    //echo $check;
    if(mysqli_num_rows($check) > 0){
        $user = mysqli_fetch_assoc($check);


        $_SESSION['user'] = [
            'id'=>$user['id'],
            'login'=>$user['login'],
            'full_name'=>$user['full_name'],
            //'avatar'=>$user['avatar'],
            'email'=>$user['email'],
            'stock'=>$user['stock'],
            'status'=>$user['status']
        ];
        //print_r($user);
        if($user['status']==='manager')
            header('Location: ../../stock/view_goods.php');
        else {
            echo 'Admin';
            header('Location:../../admin/admin.php');

        }
            

        

    }else{
        $_SESSION['msg'] = 'Неверный email или пароль';
        header('Location: ../login.php');
    }

?>