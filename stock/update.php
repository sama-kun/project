<?php
    session_start();
    require_once '../config/connect.php';
    if (!$_SESSION['user']) {
        header('Location: ../php_auth/login.php');
    }
    $id = $_GET['id'];
    $good = mysqli_query($con,"SELECT * FROM `goods` WHERE `id`='$id'");
    $good = mysqli_fetch_assoc($good);
    print_r($good);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="./css/view.css">
    <title>Update the good</title>
</head>
<body>


    <h2>Update the good</h2>
    <form method="POST" action="./vendor/update.php?">
        <label>Title</label>
        <input type="text" name="title" placeholdger="Enter title" maxlength="50" value="<?= $good['title']?>"/>
        <label>Serial number</label>
        <input type="number" name="serial" placeholdger="Enter serial number" maxlength="50" value="<?= $good['serial_number'] ?>"/>
        <label>Inventory number</label>
        <input type="number" name="invent" placeholder="Enter the inventory number" value="<?= $good['number']?>"/>
        <input type="hidden" name="id" value="<?=$id?>"/>
        <button type="submit">Update</button>
        <?php
            if(isset($_SESSION['msg'])){
                echo '<p class="msg">' . $_SESSION['msg'] . ' </p>';
            }
            unset($_SESSION['msg']);

        ?>
    </form>
    <a href="./view_goods.php">Back</a>

    
</body>
</html>