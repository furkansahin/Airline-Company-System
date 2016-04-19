<?php

    $servername = "127.0.0.1";
    $user = "root";
    $pass = "mfs12";
    $dbname = "airline";

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
        header("Location: reservations.php?function=1");
    }
    if ($res && strcmp($_GET['type'], 't') == 0){
        header("Location: reservations.php?function=2");
    }
    if (!$res){
        header("Location: reservations.php?function=3");
    }
 ?>
