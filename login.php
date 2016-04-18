<?PHP
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

    $sql = "SELECT * FROM manager NATURAL JOIN reservationauthoritative WHERE username='".$u_id."' AND password='".$u_pass."'";
    $res = mysqli_query($con, $sql);

    session_start();
    if (mysqli_num_rows($res) > 0){
        header('Location: manager/index.php');
        $_SESSION['is_logged_in'] = 1;
        $_SESSION['id'] = $u_id;
    }
    else{
        $sql = "SELECT * FROM salesperson NATURAL JOIN reservationauthoritative WHERE user_name='".$u_id."' AND password='".$u_pass."'";
        $res = mysqli_query($con, $sql);

        if (mysqli_num_row($res) == 1){
            header('Location: salesperson/index.php');
            $_SESSION['is_logged_in'] = 2;
            $_SESSION['id'] = $u_id;
        }
        else{
            $sql = "SELECT * FROM customer WHERE user_name='".$u_id."' AND password='".$u_pass."'";
            $res = mysqli_query($con, $sql);

            if (mysqli_num_rows($res) == 1){
                header('Location: customer/index.php');
                $_SESSION['is_logged_in'] = 3;
                $_SESSION['id'] = $u_id;
            }
            else{
                header('Location: index.php?r=1');
            }
        }
    }

?>
