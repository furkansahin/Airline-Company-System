<?PHP

	if(isset($_GET['id']))
	{
		$servername = "localhost";
		$user = "root";
		$pass = "mfs12";
		$dbname = "airline";

		$con = mysqli_connect($servername, $user, $pass, $dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$id = $_GET['id'];


		$sql = "DELETE FROM flightattendance WHERE staff_id='$id'";
		$result = mysqli_query($con,$sql);


		$con->close();

		if($result)
			header('Refresh: 2; URL=crews.php?function=7');
		else
			header('Refresh: 2; URL=crews.php?function=8');
	}
?>
