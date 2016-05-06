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

  $sql = "SELECT * FROM flight WHERE '$fid' = 'flight_id'";
  $result = mysqli_query($con,$sql);

  if( mysqli_num_rows($result) > 0)
    header('Refresh: 2; URL=index.php?function=6'); //change the error code

	$sql = "INSERT INTO flight VALUES('$planeName', '$rid', '$date', '$time', '$fid', $delay, $busi, $econ, '$meal', $luggage, '$seats')";
	$result = mysqli_query($con,$sql);

	$con->close();

	if($result)
		header('Refresh: 2; URL=index.php?function=5');
	else
		header('Refresh: 2; URL=index.php?function=6');
?>
