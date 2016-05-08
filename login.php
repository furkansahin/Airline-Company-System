<?PHP
	if(isset ($_POST ['Submit']))
	{
		$u_id = $_POST['user_name'];
		$u_pass = $_POST['inputPassword'];

		$servername = "127.0.0.1";
		$user = "root";
		$pass = "mfs12";
		$dbname = "airline";

		$con = mysqli_connect($servername, $user, $pass, $dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$sql1 = "SELECT * FROM manager NATURAL JOIN reservationauthoritative WHERE username='".$u_id."' AND password='".$u_pass."'";
		$sql2 = "SELECT * FROM salesperson NATURAL JOIN reservationauthoritative WHERE username='".$u_id."' AND password='".$u_pass."'";
		$sql3 = "SELECT * FROM customer WHERE user_name='".$u_id."' AND password='".$u_pass."'";

		$res = mysqli_query($con, $sql1);
		if($res && mysqli_num_rows($res) > 0)
		{
			session_start();
			$_SESSION['is_logged_in'] = 1;
			$_SESSION['id'] = $u_id;
			header('Location: manager/index.php');
			$con->close();
			exit();
		}
		$res = mysqli_query($con, $sql2);
		if($res && mysqli_num_rows($res) > 0)
		{
			session_start();
			$_SESSION['is_logged_in'] = 2;
			$_SESSION['id'] = $u_id;
			header('Location: salesperson/index.php');
			$con->close();
			exit();
		}
		$res = mysqli_query($con, $sql3);
		$con->close();
		if($res && mysqli_num_rows($res) > 0)
		{
			session_start();
			while($row = $res->fetch_assoc()) {
				$_SESSION['name'] =  $row['name'];
			}
			$_SESSION['is_logged_in'] = 3;
			$_SESSION['id'] = $u_id;
			header('Location: customer/index.php');
			exit();

		}

		header('Location: index.php?r=1');

	}
	else
	{
		header('Location: index.php');
	}


?>
