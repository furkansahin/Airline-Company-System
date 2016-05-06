<?PHP  

	if(isset ($_POST ['Submit1']))
	{
		session_start();
		
		$uid = $_SESSION['id'];
		$fid1 = $_POST['radio1'];
		$fid2 = $_POST['radio2'];
		$class = $_POST['class'];

		$servername = "localhost";
		$user = "root";
		$pass = "mfs12";
		$dbname = "airline";

		$con = mysqli_connect($servername, $user, $pass, $dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		if($fid2){
				if( $class == 'Economy' ){
					$sql = "INSERT INTO reservation select '$uid', plane_name, route_id, date, departure_time, NULL, 'E', '0' from flight where flight_id = '$fid1'"; 
					$result = mysqli_query($con,$sql);
					$sql = "INSERT INTO reservation select '$uid', plane_name, route_id, date, departure_time, NULL, 'E', '0' from flight where flight_id = '$fid2'"; 
					$result2 = mysqli_query($con,$sql);
				}else{
					$sql = "INSERT INTO reservation select '$uid', plane_name, route_id, date, departure_time, NULL, 'B', '0' from flight where flight_id = '$fid1'"; 
					$result = mysqli_query($con,$sql);
					$sql = "INSERT INTO reservation select '$uid', plane_name, route_id, date, departure_time, NULL, 'B', '0' from flight where flight_id = '$fid2'"; 
					$result2 = mysqli_query($con,$sql);
				}
		
		}else{
			if( $class == 'Economy' ){
				$sql = "INSERT INTO reservation select '$uid', plane_name, route_id, date, departure_time, NULL, 'E', '0' from flight where flight_id = '$fid1'"; 
				$result = mysqli_query($con,$sql);
			}else{
				$sql = "INSERT INTO reservation select '$uid', plane_name, route_id, date, departure_time, NULL, 'B', '0' from flight where flight_id = '$fid1'"; 
				$result = mysqli_query($con,$sql);
			}
		
		}
		
		
		if($fid2 && $result && $result2){
			header('Refresh: 2; URL=index.php?function=1');
		} else if ($fid2 == NULL && $result ){
				header('Refresh: 2; URL=index.php?function=1');
		}
		else
			header('Refresh: 2; URL=index.php?function=2');
	}

	if(isset ($_POST ['Submit2']))
	{
		session_start();
		
		$uid = $_SESSION['id'];
		$fid1 = $_POST['radio1'];
		$fid2 = $_POST['radio2'];
		$class = $_POST['class'];

		$servername = "localhost";
		$user = "root";
		$pass = "mfs12";
		$dbname = "airline";

		$con = mysqli_connect($servername, $user, $pass, $dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		if($fid2){
				if( $class == 'Economy'  ){
					$sql = "INSERT INTO ticket select '$uid', plane_name, route_id, date, departure_time, NULL, 0, '', 'E', economy_price / 4, 'A1', economy_price from flight where flight_id = '$fid1'"; 
					$result = mysqli_query($con,$sql);
					$sql = "INSERT INTO ticket select '$uid', plane_name, route_id, date, departure_time, NULL, 0, '', 'E', economy_price / 4, 'A1', economy_price from flight where flight_id = '$fid2'"; 
					$result2 = mysqli_query($con,$sql);
				}else{
					$sql = "INSERT INTO ticket select '$uid', plane_name, route_id, date, departure_time, NULL, 0, '', 'B', business_price / 4, 'A1', business_price from flight where flight_id = '$fid1' "; 
					$result = mysqli_query($con,$sql);
					$sql = "INSERT INTO ticket select '$uid', plane_name, route_id, date, departure_time, NULL, 0, '', 'B', business_price / 4, 'A1', business_price from flight where flight_id = '$fid2'"; 
					$result2 = mysqli_query($con,$sql);
				}
		
		}else{
			if( $class == 'Economy'  ){
				$sql = "INSERT INTO ticket select '$uid', plane_name, route_id, date, departure_time, NULL, 0, '', 'E', economy_price / 4, 'A1', economy_price from flight where flight_id = '$fid1' "; 
					$result = mysqli_query($con,$sql);
			}else{
				$sql = "INSERT INTO ticket select '$uid', plane_name, route_id, date, departure_time, NULL, 0, '', 'B', business_price / 4, 'A1', business_price from flight where flight_id = '$fid1'"; 
					$result = mysqli_query($con,$sql);
			}
		
		}
		
		if($fid2 && $result && $result2){
			header('Refresh: 2; URL=index.php?function=3');
		} else if ($fid2 == NULL && $result ){
			header('Refresh: 2; URL=index.php?function=3');
		}
		else
			header('Refresh: 2; URL=index.php?function=4');
	}



?>