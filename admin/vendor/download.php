<?php
    session_start();
    //echo $_SESSION['output'];
    if(isset($_SESSION['output'])){
        $output = $_SESSION['output'];
        
        header("Content-Type: application/xls");    
        header("Content-Disposition: attachment; filename=download.xls");  
        
        print $output;
        unset($_SESSION['output']);
        //header('Location: ../admin.php');
    }


?>