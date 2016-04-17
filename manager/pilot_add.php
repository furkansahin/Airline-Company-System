<?PHP  

	if(isset ($_POST ['AddPilot']))
	{
		
		$id = $_POST['pilotid'];
		$name = $_POST['pilotname'];
		$salary = $_POST['pilotsalary'];
		$birthdate = $_POST['pilotbdate'];
		$gender= $_POST['pilotgender'];
		$phone= $_POST['pilotphone'];
		$license= $_POST['pilotlicense'];
		$rank= $_POST['pilotrank'];
		$max= $_POST['pilotmax'];

		$servername = "localhost";
		$user = "root";
		$pass = "mfs12";
		$dbname = "airline";

		$con = mysqli_connect($servername, $user, $pass, $dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$result2 = NULL; $result3 = NULL;
		$sql = "INSERT INTO staff VALUES('$id', '$name', '$salary', '$birthdate', NULL, '$gender')"; 
		$result = mysqli_query($con,$sql);
		if($result){
			$sql = "INSERT INTO crew VALUES('$id', '$license', '$rank', NULL )"; 
			$result2 = mysqli_query($con,$sql);
		}
		if($result2){
			$sql = "INSERT INTO pilot VALUES('$id', '$max')"; 
			$result3 = mysqli_query($con,$sql);
		}	
		if($result3){
			$sql = "INSERT INTO staffphones VALUES('$id', '$phone')"; 
			$result3 = mysqli_query($con,$sql);
		}
		$con->close();
		
		if($result )
			header('Refresh: 2; URL=crews.php?function=3');
		else
			header('Refresh: 2; URL=crews.php?function=4');
	}

?>