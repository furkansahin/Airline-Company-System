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
    $name = "";
    $plane_name = "";
    $route_id = "";
    $date = "";
    $departure_time = "";
    $id = $_GET['id'];
    $extra_luggage = 0;
    $meal = "";
    $class = "";
    $penalty_amount = 0;
    $seat_no = "";
    $price = 0;


    $sql = "SELECT * FROM reservation NATURAL JOIN flight WHERE reservation_no='$id'";

    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_array($res, MYSQL_ASSOC);

        $name = $row['user_name'];
        $plane_name = $row['plane_name'];
        $route_id = $row['route_id'];
        $date = $row['date'];
        $departure_time = $row['departure_time'];
        $class = $row['class'];
        if (strcmp($class, "e") == 0){
            $price = $row["economy_price"];
        }
        elseif (strcmp($class, "b") == 0){
            $price = $row["business_price"];
        }
    }
    $sql = "INSERT INTO ticket VALUES ('$name', '$plane_name', '$route_id', '$date', '$departure_time',"
            ." 0, $extra_luggage, '$meal', '$class', $penalty_amount, '$seat_no', $price)";

    $res = mysqli_query($con, $sql);



    if ($res){
        $sql = "DELETE FROM reservation WHERE reservation_no='$id'";

        $res = mysqli_query($con,$sql);
        if ($res){
            header("Location: customer_reservation.php?function=14&user_name=".$name);
        }
    }

    if (!$res){
        header("Location: customer_reservation.php?function=15&user_name=".$name);
    }
 ?>
