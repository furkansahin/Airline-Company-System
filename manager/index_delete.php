<?PHP

		$servername = "127.0.0.1";
		$user = "root";
		$pass = "mfs12";
		$dbname = "airline";

		$con = mysqli_connect($servername, $user, $pass, $dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$id = $_GET['flight_id'];


		$sql = "DELETE FROM flight WHERE flight_id='$id'";
		$result = mysqli_query($con,$sql);


		$con->close();

		if($result)
			header('Refresh: 2; URL=index.php?function=3');
		else
			header('Refresh: 2; URL=index.php?function=4');
?>
