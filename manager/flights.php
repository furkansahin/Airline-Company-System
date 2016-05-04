
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
	<title> Manager </title>
</head>
<body>

	<div class = "wrapper">
		<header>

			<ul>
				<li>Welcome Manager</li>
				<li><form class="form-signin" action='../logout.php' method='POST'>
					<input type='submit' name='Submit' value='Logout' class='btn btn-primary'/>
				</form></li>
			</ul>

		</header>

		<div id = "breaksection2">
		</div>
		<div class="row">
			<div class="col-sm-3">

				<nav class="navbar navbar-default" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><b>Airline Corp</b></a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li><a href="index.php">Flights</a></li>
							<li><a href="routes.php">Routes</a></li>
							<li><a href="crews.php">Crews</a></li>
							<li><a href="airports.php">Airports</a></li>
							<li><a href="customers.php">Customers</a></li>
							<li class="active"><a href="flights.php">Flight Information</a></li>
							<li><a href="planes.php">Planes</a></li>
						</ul>
					 </div><!-- /.navbar-collapse -->
				</nav>
			</div>

			<div class="col-sm-8">
					<h2>Search Flights with id</h2>
					<form action="" method="post">
					  Flight id: <input name="example" type="text" />
					  <input name="submit" type="submit" />
					</form>
					
					<br/>

					<img src="../img/flightmap.jpg" class="img-responsive">

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

							if (isset($_POST['submit'])) {
							    $flightid = $_POST['example'];
							   	$sql = "SELECT * FROM flight where flight_id = '$flightid';";
							$result = mysqli_query($con,$sql);

							$sql = "SELECT count(*) as resNo FROM reservation natural join customer natural join flight where flight_id = '$flightid';";
							$result2 = mysqli_query($con,$sql);

							$sql = "SELECT count(*) as ticketNo FROM ticket natural join customer natural join flight where flight_id = '$flightid';";
							$result3 = mysqli_query($con,$sql);

							$html = "";
							if($result)
							{
								if ($result->num_rows > 0 && $result2->num_rows > 0)
								{
									// output data of each row
									$row = $result->fetch_assoc(); 
									$row2 = $result2->fetch_assoc();
									$row3 = $result3->fetch_assoc();
									$total = $row2["resNo"] + $row3["ticketNo"];
									$html = $html .	"<h3>". "Delay of the Flight: " . $row["delay"] . " minutes"
												.	"<h3>". "Reserved / Sold / Total Tickets: " . $row2["resNo"] .  " - "
												. $row3["ticketNo"] . " - "
												. $total
												.	"<h3>". "Current Reservations for Flight " . $row["flight_id"] . "</h3>";
									
								} else {
									echo "";
								}
							}
							echo $html;
							  }

						

							
						?>
			

					<br/>

					<table class="table table-striped">

						<thead>
							<tr>
								<th>Ticket/Reservation No</th>
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

							if (isset($_POST['submit'])) {
							    $flightid = $_POST['example'];	

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
										$html = $html 	.	"<tr>"
														.	"<td>". $row["ticket_no"] . "</td>"
														.	"<td>". $row["user_name"] . "</td>"
														.	"<td>". $row["name"] . "</td>"
														.	"<td>". $row["class"] . "</td>"
														.	"<td>". $row["meal"] . "</td>"
														.	"<td>". $row["extra_luggage"] . "</td>"
														.	"<td>". "Sold" . "</td>"
														.   "<td>". "<a href='customer_ticket_remove.php?id=$id'>Remove</a>". "</td>"
														.	"</tr>";
									}
								} else {
									echo "";
								}
							}
							echo $html;

							$sql = "SELECT * FROM reservation natural join customer natural join flight where flight_id = '$flightid';";
							$result = mysqli_query($con,$sql);

							$html = "";
							if($result)
							{
								if ($result->num_rows > 0)
								{
									// output data of each row
									while($row = $result->fetch_assoc()) {
										$id = $row['reservation_no'];
										$html = $html 	.	"<tr>"
														.	"<td>". $row["reservation_no"] . "</td>"
														.	"<td>". $row["user_name"] . "</td>"
														.	"<td>". $row["name"] . "</td>"
														.	"<td>". $row["class"] . "</td>"
														.	"<td>". "-" . "</td>"
														.	"<td>". "-" . "</td>"
														.	"<td>". "Reserved" . "</td>"
														.   "<td>". "<a href='customer_reservation_remove.php?id=$id'>Remove</a>". "</td>"
														.	"</tr>";
									}
								} else {
									echo "";
								}
							}
							echo $html;
							}
						?>



						</tbody>
					</table>

			</div>

		</div>
	</div>

	<div class="modal fade" id="deleteSuccess" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Reservation/Ticket is removed from the system. </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>

	<div class="modal fade" id="deleteFail" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Reservation/Ticket could not be deleted. </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>


</body>
</html>

<!-- Openning modal on delete application -->
<?PHP

	if(isset($_GET['function']))
	{
		if($_GET['function'] == 1 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#deleteSuccess').modal('show');
				});
				</script>";
		}
		if($_GET['function'] == 2 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#deleteFail').modal('show');
				});
				</script>";
		}
	
	}

?>


