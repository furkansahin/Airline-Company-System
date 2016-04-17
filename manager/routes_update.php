<?PHP  

	if(isset ($_POST ['Submit']))
	{
		
		$id = $_POST['routecode'];
		$departs = $_POST['routedepart'];
		$arrives = $_POST['routearrive'];
		$duration = $_POST['routeduration'];
		$mile = $_POST['routedistance'];
		
		$servername = "localhost";
		$user = "root";
		$pass = "mfs12";
		$dbname = "airline";

		$con = mysqli_connect($servername, $user, $pass, $dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$sql = "UPDATE route SET flight_duration='$duration', total_mile = $mile, departs = '$departs', arrives = '$arrives' WHERE route_id='$id'"; 

		$result = mysqli_query($con,$sql);
		
		$con->close();
		
		header('Refresh: 2; URL=routes.php?function=2');
	}

?>