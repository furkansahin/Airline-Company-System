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


		$sql = "DELETE FROM ticket WHERE ticket_no='$id'"; 
		$result = mysqli_query($con,$sql);

		
		$con->close();
		
		if($result)
			header('Refresh: 2; URL=flights.php?function=1');
		else
			header('Refresh: 2; URL=flights.php?function=2');
	}
?>