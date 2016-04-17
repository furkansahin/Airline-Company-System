<?PHP

	if(isset ($_POST ['Submit']))
	{

		$name = $_POST['formname'];
		$type = $_POST['formtype'];
		$availability = $_POST['formavailability'];

		$servername = "127.0.0.1";
		$user = "root";
		$pass = "mfs12";
		$dbname = "airline";

		$con = mysqli_connect($servername, $user, $pass, $dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

        $num = (int)$availability;
		$sql = "INSERT INTO plane VALUES('$name', $num, '$type');";
		$result = mysqli_query($con,$sql);

		$con->close();

		if($result)
			header('Refresh: 2; URL=planes.php?function=5');
		else
			header('Refresh: 2; URL=planes.php?function=6');
	}

?>
