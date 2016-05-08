<?php
session_start();

$id = $_POST['id'];
$name = $_POST['user_name'];
$amount = $_POST['extraLuggage'];

$servername = "127.0.0.1";
$user = "root";
$pass = "mfs12";
$dbname = "airline";

$con = mysqli_connect($servername, $user, $pass, $dbname);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "UPDATE ticket SET extra_luggage=$amount WHERE ticket_no='$id'";

$result = mysqli_query($con, $sql);

$con -> close();

if($result){
//        echo $sql;
    header("Location: customer_reservation.php?function=10&user_name=".$name);
}
else{
    header("Location: customer_reservation.php?function=11&user_name=".$name);
}
 ?>
