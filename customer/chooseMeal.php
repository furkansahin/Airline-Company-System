<?php
    session_start();

    $id = $_POST['id'];
    $type = $_POST['type'];
    $name = $_SESSION['id'];
    $servername = "127.0.0.1";
    $user = "root";
    $pass = "mfs12";
    $dbname = "airline";

    $con = mysqli_connect($servername, $user, $pass, $dbname);

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

    $meal = "";
    if (isset($_POST['meal'])){
        $meal = $_POST['meal'];
    }
    $sql = "";
    $sql = "UPDATE ticket SET meal='$meal' WHERE ticket_no='$id'";

    $result = mysqli_query($con, $sql);

    if($result){
//        echo $sql;
        header("Location: reservations.php?function=8");
    }
    else{
        header("Location: reservations.php?function=9");
    }
 ?>
