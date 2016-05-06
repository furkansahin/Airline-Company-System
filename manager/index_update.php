<?PHP
  $fid = $_POST['flightNo'];
  $rid = $_POST['routeID'];
  $planeName = $_POST['planeName'];
  $date = $_POST['flightdate'];
  $time = $_POST['flighttime'];
  $luggage = $_POST['flightluggage'];
  $econ = $_POST['priceecon'];
  $busi = $_POST['pricebusi'];
  $meal = $_POST['meals'];
  $delay = $_POST['delay'];
  $seats = $_POST['seatmap'];

	$servername = "localhost";
	$user = "root";
	$pass = "mfs12";
	$dbname = "airline";

	$con = mysqli_connect($servername, $user, $pass, $dbname);

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql = "UPDATE flight
          SET plane_name=     '$planeName',
              route_id=       '$rid',
              date=           '$date',
              departure_time= '$time',
              flight_id=      '$fid',
              delay=           $delay,
              business_price=  $busi,
              economy_price=   $econ,
              meals=          '$meal',
              luggage=         $luggage,
              seatmap=        '$seats'
          WHERE flight_id=    '$fid'";
	$result = mysqli_query($con,$sql);

	$con->close();

  if($result)
		header('Refresh: 2; URL=index.php?function=2');
	else
		header('Refresh: 2; URL=index.php?function=6');
?>
