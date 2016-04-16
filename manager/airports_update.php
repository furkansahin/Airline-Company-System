<?PHP  

	if(isset ($_POST ['Submit']))
	{
		
		$id = $_POST['aircode'];
		$city = $_POST['aircity'];
		$address = $_POST['airaddr'];
		$capacity = $_POST['aircity'];
		
		$servername = "localhost";
		$user = "root";
		$pass = "mfs12";
		$dbname = "airline";

		$con = mysqli_connect($servername, $user, $pass, $dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$sql = "UPDATE airport SET address='$address', airport_capacity = $capacity WHERE airport_id='$id'"; 
		$result = mysqli_query($con,$sql);
		
		header('Refresh: 2; URL=airports.php?function=2');
	}

?>