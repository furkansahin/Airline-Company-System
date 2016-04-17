<?PHP
	
	if(isset($_GET['user_name']))
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

		$user_name = $_GET['user_name'];


		$sql = "DELETE FROM customer WHERE user_name='$user_name'"; 
		$result = mysqli_query($con,$sql);

		
		$con->close();
		
		if($result)
			header('Refresh: 2; URL=customers.php?function=3');
		else
			header('Refresh: 2; URL=customers.php?function=4');
	}
?>