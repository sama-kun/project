<?php

    session_start();
    // if (!$_SESSION['user']) {
    //     header('Location: ../php_auth/login.php');
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="./css/style_adder.css">
    <title>Add new good</title>
</head>
<body>
    <form action="./vendor/add.php" method="post">
        <br>
        
        <label>Title</label>
        <input type="text" name="title" placeholdger="Enter title" maxlength="50" />
        <label>Serial number</label>
        <input type="number" name="serial" placeholdger="Enter serial number" maxlength="50" />
        <label>Inventory number</label>
        <input type="number" name="invent" placeholder="Enter the inventory number" />
        <input type="submit" value="Add"/>
        <a href="./view_goods.php">Back</a>
        <?php
            if(isset($_SESSION['msg'])){
                echo '<p class="msg">' . $_SESSION['msg'] . ' </p>';
            }
            unset($_SESSION['msg']);

        ?>
    </form>


<?php
    
?>


</form>
</body>
</html>