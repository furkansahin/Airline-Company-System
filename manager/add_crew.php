<?PHP
		$fid = $_POST['flight_id'];

    if(isset($_POST['formp1'])){
        $id1 = $_POST['formp1'];
    }
    else $id1 = '';

    if(isset($_POST['formp2'])){
        $id2 = $_POST['formp2'];
    }
    else $id2 = '';

    if(isset($_POST['formp3'])){
        $id3 = $_POST['formp3'];
    }
    else $id3 = '';

    if(isset($_POST['formc1'])){
        $id4 = $_POST['formc1'];
    }
    else $id4 = '';

    if(isset($_POST['formc2'])){
        $id5 = $_POST['formc2'];
    }
    else $id5 = '';

    if(isset($_POST['formc3'])){
        $id6 = $_POST['formc3'];
    }
    else $id6 = '';

    if(isset($_POST['formc4'])){
        $id7 = $_POST['formc4'];
    }
    else $id7 = '';

		$servername = "127.0.0.1";
		$user = "root";
		$pass = "mfs12";
		$dbname = "airline";

		$con = mysqli_connect($servername, $user, $pass, $dbname);

		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

    if( $id1 != ''){
		    $sql = "INSERT INTO flightcrew VALUES('$id1', '$fid')";
		    $result = mysqli_query($con,$sql);
    }

    if( $id2 != ''){
		    $sql = "INSERT INTO flightcrew VALUES('$id2', '$fid')";
		    $result = mysqli_query($con,$sql);
    }

    if( $id3 != ''){
		    $sql = "INSERT INTO flightcrew VALUES('$id3', '$fid')";
		    $result = mysqli_query($con,$sql);
    }

    if( $id4 != ''){
		    $sql = "INSERT INTO flightcrew VALUES('$id4', '$fid')";
		    $result = mysqli_query($con,$sql);
    }

    if( $id5 != ''){
		    $sql = "INSERT INTO flightcrew VALUES('$id5', '$fid')";
		    $result = mysqli_query($con,$sql);
    }

    if( $id6 != ''){
		    $sql = "INSERT INTO flightcrew VALUES('$id6', '$fid')";
		    $result = mysqli_query($con,$sql);
    }

    if( $id7 != ''){
		    $sql = "INSERT INTO flightcrew VALUES('$id7', '$fid')";
		    $result = mysqli_query($con,$sql);
    }

		$con->close();

		if($result)
			header('Refresh: 2; URL=index.php?function=8');
		else
			header('Refresh: 2; URL=index.php?function=9');

?>
