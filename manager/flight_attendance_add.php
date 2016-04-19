<?PHP  

	if(isset ($_POST ['AddAttendant']))
	{
		
		$id = $_POST['attendantid'];
		$name = $_POST['attendantname'];
		$salary = $_POST['attendantsalary'];
		$birthdate = $_POST['attendantbirthdate'];
		$gender= $_POST['attendantgender'];
		$phone= $_POST['attendantphone'];
		$license= $_POST['attendantlicense'];
		$rank= $_POST['attendantrank'];
		$class= $_POST['attendantclass'];

		$servername = "localhost";
		$user = "root";
		$pass = "mfs12";
		$dbname = "airline";

		$con = mysqli_connect($servername, $user, $pass, $dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$sql = "INSERT INTO staff VALUES('$id', '$name', '$salary', '$birthdate', NULL, '$gender')"; 
		$result = mysqli_query($con,$sql);
		$sql = "INSERT INTO crew VALUES('$id', '$license', '$rank', NULL )"; 
		$result2 = mysqli_query($con,$sql);
		$sql = "INSERT INTO flightattendance VALUES('$id', '$class')"; 
		$result3 = mysqli_query($con,$sql);

		$con->close();
		
		if($result && $result2 && $result3 )
			header('Refresh: 2; URL=crews.php?function=1');
		else
			header('Refresh: 2; URL=crews.php?function=2');
	}

?>