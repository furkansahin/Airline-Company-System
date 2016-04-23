<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="countdown.js"></script>

    <link href='https://fonts.googleapis.com/css?family=New+Rocker' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="http://meyerweb.com/eric/tools/css/reset/reset.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="jquery.bootstrap-touchspin.js"></script>
    <!-- ... -->
      <script type="text/javascript" src="bower_components/moment/min/moment.min.js"></script>
      <script type="text/javascript" src="bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
      <link rel="stylesheet" href="bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
      <link rel="stylesheet" type="text/css" href="manager_style.css">
    <title> User Profile </title>
</head>
<body>

    <div class = "wrapper">
        <header style ="position: relative">

            <ul>
                <li>Welcome Manager</li>
                <li><form class="form-signin" action='../logout.php' method='POST'>
                    <input type='submit' name='Submit' value='Logout' class='btn btn-primary'/>
                </form></li>
            </ul>

        </header>


        <h1> Current Sold and Reserved Tickets for Flight AC1111 </h1>

        <div class="row">

            <div class="panel panel-warning">
                <div class="panel-heading">Reserved Tickets </div>
                <div class="panel-body">

                   <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Customer Name</th>
                                <th>Class</th>
                                <th>Meal</th>
                                <th>Extra Luggage</th>
                                <th>Reserved/Sold</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?PHP

                            $servername = "localhost";
                            $user = "root";
                            $pass = "mfs12";
                            $dbname = "airline";

                            $con = mysqli_connect($servername, $user, $pass, $dbname);

                            if (mysqli_connect_errno())
                            {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            }

                           include reservations.php;

                            $sql = "SELECT * FROM ticket natural join customer natural join flight where flight_id = '$flightid';";
                            $result = mysqli_query($con,$sql);

                            $html = "";
                            if($result)
                            {
                                if ($result->num_rows > 0)
                                {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $id = $row['ticket_no'];
                                        $html = $html   .   "<tr>"
                                                        .   "<td>". $row["ticket_no"] . "</td>"
                                                        .   "<td>". $row["user_name"] . "</td>"
                                                        .   "<td>". $row["name"] . "</td>"
                                                        .   "<td>". $row["class"] . "</td>"
                                                        .   "<td>". $row["meal"] . "</td>"
                                                        .   "<td>". $row["extra_luggage"] . "</td>"
                                                        .   "<td>". "Sold" . "</td>"
                                                        .   "<td>". "<a href='customer_ticket_remove.php?id=$id'>Remove</a>". "</td>"
                                                        .   "</tr>";
                                    }
                                } else {
                                    echo "";
                                }
                            }
                            echo $html;
                        ?>


                </div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">Sold Tickets </div>
                <div class="panel-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Customer Name</th>
                                <th>Reserved On</th>
                                <th>Class</th>
                                <th>Show Customer Info</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tr>
                            <td> C3546512151 </td>
                            <td> oguzdemir</td>
                            <td> 11/11/1111 : 88:88</td>
                            <td> Economy</td>
                            <td> <button type="button" class="glyphicon glyphicon-user"></button></td>
                            <td> <button type="button" class="glyphicon glyphicon-trash"></button> </td>

                        </tr>
                        <tr>
                            <td> C3546512151 </td>
                            <td> oguzdemir</td>
                            <td> 11/11/1111 : 88:88</td>
                            <td> Economy</td>
                            <td> <button type="button" class="glyphicon glyphicon-user"></button></td>
                            <td> <button type="button" class="glyphicon glyphicon-trash"></button> </td>

                        </tr>
                        <tr>
                            <td> C3546512151 </td>
                            <td> oguzdemir</td>
                            <td> 11/11/1111 : 88:88</td>
                            <td> Economy</td>
                            <td> <button type="button" class="glyphicon glyphicon-user"></button></td>
                            <td> <button type="button" class="glyphicon glyphicon-trash"></button> </td>

                        </tr>
                        <tr>
                            <td> C3546512151 </td>
                            <td> oguzdemir</td>
                            <td> 11/11/1111 : 88:88</td>
                            <td> Economy</td>
                            <td> <button type="button" class="glyphicon glyphicon-user"></button></td>
                            <td> <button type="button" class="glyphicon glyphicon-trash"></button> </td>

                        </tr>
                    </table>


                </div>
            </div>
        </div>

    </div>

</body>
</html>

