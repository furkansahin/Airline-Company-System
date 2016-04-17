<?PHP
    if(isset($_GET['id']))
    {
        $servername = "127.0.0.1";
        $user = "root";
        $pass = "mfs12";
        $dbname = "airline";

        $con = mysqli_connect($servername, $user, $pass, $dbname);

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $id = $_GET['id'];

        $sql = "SELECT * FROM plane WHERE plane_name='$id'";
        $res = mysqli_query($con, $sql);
        if ($res -> num_rows > 0){
            $row = $res -> fetch_assoc();

            if ($row['available'] == 1){
                $sql = "UPDATE plane SET available=0 WHERE plane_name='".$_GET['id']."'";
            }
            else{
                $sql = "UPDATE plane SET available=1 WHERE plane_name='".$_GET['id']."'";
            }
            $result = mysqli_query($con,$sql);

    		$con->close();

    		if($result)
    			header('Refresh: 2; URL=planes.php?function=1');
    		else
    			header('Refresh: 2; URL=planes.php?function=2');
        }
    }

?>
