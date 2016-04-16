<?PHP  

	if(isset ($_POST ['Submit']))
	{
		
		$id = $_POST['aircode'];
		$city = $_POST['aircity'];
		$address = $_POST['airaddr'];
		$capacity = $_POST['aircapacity'];
		
		$servername = "localhost";
		$user = "root";
		$pass = "mfs12";
		$dbname = "airline";

		$con = mysqli_connect($servername, $user, $pass, $dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$sql = "INSERT INTO airport VALUES('$id', $capacity, '$address', '$city')"; 
		$result = mysqli_query($con,$sql);
		
		$con->close();
		
		if($result)
			header('Refresh: 2; URL=airports.php?function=5');
		else
			header('Refresh: 2; URL=airports.php?function=6');
	}

?>