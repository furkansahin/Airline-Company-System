<?PHP  

	if(isset ($_POST ['Submit2']))
	{
		session_start();
		
		$uid = $_SESSION['id'];
		$fid1 = $_POST['radio1'];
		$fid2 = $_POST['radio2'];
		
		echo $id1;
		echo "\n" . $id2;
		
		header('Refresh: 2; URL=index.php?function=1');
		/*
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
			header('Refresh: 2; URL=routes.php?function=6');*/
	}

?>