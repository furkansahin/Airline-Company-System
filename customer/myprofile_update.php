<?PHP  
	if(isset ($_POST ['Submit']))
	{
		
		$id = $_POST['formuname'];
		$name = $_POST['formuname2'];
		$password = $_POST['formupass'];
		$newpass1 = $_POST['formrepas1'];
		$newpass2 = $_POST['formrepas2'];
		$birthdate = $_POST['formbirth'];
		$passport = $_POST['formpassport'];

		echo $birthdate;
		$servername = "localhost";
		$user = "root";
		$pass = "mfs12";
		$dbname = "airline";
		
		$con = mysqli_connect($servername, $user, $pass, $dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$sql = "SELECT * FROM customer WHERE user_name='$id'";
		$result = mysqli_query($con,$sql);

		
		if($result)
		{
			if ($result->num_rows > 0) 
			{
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$swpassword = $row["password"];
				}
			} 
		}
		
		
		if($swpassword != $password)
		{
			$con->close();
			header('Location:myprofile.php?f=1');
			exit();
		}

		if(!$newpass1  && !$newpass2)
		{
			$sql = "UPDATE customer SET birthdate= '$birthdate', passport_no = '$passport', name = '$name' WHERE user_name='$id'";
			echo $sql;
			$result = mysqli_query($con,$sql);
			$con->close();
			header('Location:myprofile.php?f=2');
			exit();
		}
		else
		{
			if( strcmp ( $newpass1, $newpass2 ) == 0)
			{
				$sql = "UPDATE customer SET password = '$newpass1',birthdate='$birthdate', passport_no = '$passport', name = '$name' WHERE user_name='$id'";
				echo $sql;
				$result = mysqli_query($con,$sql);
				$con->close();
				header('Location:myprofile.php?f=3');
				exit();
			}
			else
			{
				$con->close();
				header('Location:myprofile.php?f=4');
				exit();
			}
		}
	}
	else
	{
		header('Location: index.php');
	}
?>
