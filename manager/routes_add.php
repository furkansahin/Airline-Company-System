<?PHP  

	if(isset ($_POST ['Submit']))
	{
		
		$id = $_POST['routecode'];
		$departs = $_POST['routedepart'];
		$arrives = $_POST['routearrive'];
		$duration = $_POST['routeduration'];
		$mile = $_POST['routedistance'];
		
		$departs = substr($departs, 0,3);
		$arrives = substr($arrives, 0,3);
		
		$servername = "localhost";
		$user = "root";
		$pass = "mfs12";
		$dbname = "airline";

		$con = mysqli_connect($servername, $user, $pass, $dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		echo $id;
		echo $duration;
		echo $mile;
		echo $departs;
		echo $arrives;
		$sql = "INSERT INTO route VALUES('$id', '$duration', $mile, '$departs', '$arrives')"; 
		$result = mysqli_query($con,$sql);
		
		$con->close();
		
		if($result)
			header('Refresh: 2; URL=routes.php?function=5');
		else
			header('Refresh: 2; URL=routes.php?function=6');
	}

?>