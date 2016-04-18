<?PHP  

	if(isset ($_POST ['Submit']))
	{
		
		$username = $_POST['username'];
		$name = $_POST['name'];
		$password = $_POST['psw'];
		$passwordagain = $_POST['psw2'];
		$bdate = $_POST['bdate'];
		$passport = $_POST['passport'];

		$servername = "localhost";
		$user = "root";
		$pass = "mfs12";
		$dbname = "airline";

		$con = mysqli_connect($servername, $user, $pass, $dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$result = NULL;
		if( $password == $passwordagain ){
			$sql = "INSERT INTO customer VALUES('$username', '$password', '$name', '$bdate', NULL, '$passport', 0, 0);"; 
			$result = mysqli_query($con,$sql);
		}
		
		$con->close();
		
		if($result)
			header('Refresh: 2; URL=register.php?function=1');
		else
			header('Refresh: 2; URL=register.php?function=2');
	}

?>