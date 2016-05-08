<?php

    $servername = "127.0.0.1";
    $user = "root";
    $pass = "mfs12";
    $dbname = "airline";
    $name = $_GET['user_name'];


    $con = mysqli_connect($servername, $user, $pass, $dbname);

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $id = $_GET['id'];

    $sql = '';
    if (strcmp($_GET['type'], 't') == 0){
        $sql = "DELETE FROM ticket WHERE ticket_no='$id'";
    }

    if (strcmp($_GET['type'], 'r') == 0){
        $sql = "DELETE FROM reservation WHERE reservation_no='$id'";
    }

    $res = mysqli_query($con,$sql);

    if ($res && strcmp($_GET['type'], 'r') == 0){
        header("Location: customer_reservation.php?function=1&user_name=".$name);
    }
    if ($res && strcmp($_GET['type'], 't') == 0){
        header("Location: customer_reservation.php?function=2&user_name=".$name);
    }
    if (!$res){
        header("Location: customer_reservation.php?function=3&user_name=".$name);
    }
 ?>
