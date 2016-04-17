<?PHP  
	if(isset ($_POST ['Submit']))
	{

		$id = $_POST['pilotid'];
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

		$sql = "UPDATE staff SET salary = '$salary', birthdate = '$birthdate', gender = '$gender' WHERE staff_id='$id'";
		$result = mysqli_query($con,$sql);
		$sql = "UPDATE crew SET license_no ='$license', rank = '$rank' WHERE staff_id='$id'";
		$result = mysqli_query($con,$sql);
		$sql = "UPDATE pilot SET max_flight_distance = '$max' WHERE staff_id='$id'";
		$result = mysqli_query($con,$sql);
		$sql = "UPDATE staffphones SET phone = '$phone' WHERE staff_id='$id'";
		$result = mysqli_query($con,$sql);
		$sql = "INSERT into staffphones values ('$id', '$phone')";
		$result = mysqli_query($con,$sql);

		$con->close();

		header('Refresh: 2; URL=crews.php?function=10');
	}

?>
