<?php

    $p_id = $_POST['promotion'];
    $t_id = $_POST['id'];
    $name = $_POST['user_name'];

    $servername = "127.0.0.1";
    $user = "root";
    $pass = "mfs12";
    $dbname = "airline";

    $con = mysqli_connect($servername, $user, $pass, $dbname);

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "DELETE FROM promotion WHERE promotion_id='$p_id'";

    $result = mysqli_query($con, $sql);

    if ($result){
        header("Location: customer_reservation.php?function=12&user_name=".$name);
    }
    else{
        header("Location: customer_reservation.php?function=13&user_name=".$name);
    }
 ?>
