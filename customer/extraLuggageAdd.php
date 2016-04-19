<?php
session_start();

$id = $_POST['id'];
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
    header("Location: reservations.php?function=10");
}
else{
    header("Location: reservations.php?function=11");
}
 ?>
