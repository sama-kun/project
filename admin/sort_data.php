<?php
    session_start();
    require_once '../config/connect.php';
    if(isset($_SESSION['user']) && $_SESSION['user']['status'] === 'admin')
        echo 'Admin';
    else 
        header('Location: ../php_auth/login.php');
    $at = $_POST['date_at'];
    $untill = $_POST['date_untill'];
    $trans = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM `transport`"));
    

    function dateSort($arr ,$from ,$to ){
        if($arr[9]>=$from && $arr[9]<= $to)
            return true;
        else 
            return false;
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" type='text/css' href="./style.css">

</head>
<body>

    <!-- Форма регистрации -->
    <?php 
    $output = '<table>
    <tr>
        <th>id</th>
        <th>Product id</th>
        <th>From stock_id</th>
        <th>to stock_id</th>
        <th>Product title</th>
        <th>Send stoc</th>
        <th>Confirm stock</th>
        <th>Name of sender</th>
        <th>Name of got</th>
        <th>Send time</th>
        <th>Arrived time</th>
        <th>Status</th>
        
    </tr>';
    //echo $start;
    foreach($trans as $item){
        if(dateSort($item,$at,$untill)){
            $output.= "\n<tr>\n"; 
            foreach($item as $i)
                $output.='<td>' . $i . "</td>\n";
            $output.= "</tr>\n";
        }
        
    
    }
    $output.='</table>';
    //echo $output;
    

    // header("Content-Type: application/xls");    
    // header("Content-Disposition: attachment; filename=download.xls");  
    // header("Pragma: no-cache"); 
    // header("Expires: 0");
    $_SESSION['output'] = $output;
    echo $_SESSION['output'];

            
    ?>
    <a href="./admin.php">Back</a><a href="./vendor/download.php">Download</a>


</body>
</html>