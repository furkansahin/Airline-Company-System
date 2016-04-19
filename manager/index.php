
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

<!-- Openning modal on delete application -->
<?PHP

	if(isset($_GET['function']))
	{
		if($_GET['function'] == 1 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#editModal').modal('show');
				});
				</script>";
		}
		if($_GET['function'] == 2 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#editSuccess').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=index.php');
		}
		if($_GET['function'] == 3 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#deleteSuccess').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=index.php');
		}
		if($_GET['function'] == 4 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#deleteFail').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=index.php');
		}
		if($_GET['function'] == 5 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#createSuccess').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=index.php');
		}
		if($_GET['function'] == 6  )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#createFail').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=index.php');
		}
	}

?>
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
			<div class="col-sm-2">

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
							<li class="active"><a href="index.php">Flights</a></li>
							<li><a href="routes.html">Routes</a></li>
							<li><a href="crews.html">Crews</a></li>
							<li><a href="airports.php">Airports</a></li>
							<li><a href="customers.php">Customers</a></li>
							<li><a href="flights.html">Flight Information</a></li>
							<li><a href="planes.html">Planes</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>
			</div>

			<div class="col-sm-10">

					<h2>FLIGHTS</h2>
					<h3><button class="btn btn-lg btn-primary " data-toggle="collapse" data-target="#demo"><i class="glyphicon glyphicon-plus"></i>Add Flight </button></h2>

					<div id="demo" class="collapse">
					<form class="form-signin" action='index_add.php' method='POST'>

						<label for="flightNo" >Flight ID </label>
						<input type="text" id="flightNo" class="form-control" placeholder="FXXX" required="">

						<label for="routeID" >Route ID </label>
						<input type="text" id="routeID" class="form-control" placeholder="RXXXXXXX" required="">

						<label for="planeName">PlaneName</label>
						<input type="text" id="planeName" class="form-control" placeholder="The Spirit" required="">


						<label for="meals" >Meals </label>
						<input type="text" id="meals" class="form-control" placeholder="Beef" required="">

						<label for="flightdate" >Date </label>
						<input type="datetime" id="flightdate" class="form-control" placeholder="2016-01-01" required="">

						<label for="flighttime" >Time </label>
						<input type="text" id="flighttime" class="form-control" placeholder="12:00:00" required="">

						<label for="flightluggage" >Luggage </label>
						<input type="text" id="flightluggage" class="form-control" placeholder="10000" required="">

						<label for="priceecon" >Price For Economy </label>
						<input type="text" id="priceecon" class="form-control" placeholder="750" required="">

						<label for="pricebusi" >Price For Business </label>
						<input type="text" id="pricebusi" class="form-control" placeholder="1500" required="">

						<label for="delay" >Delay </label>
						<input type="text" id="delay" class="form-control" placeholder="0" required="">
						<br/>
						<button class="btn btn-lg" type="submit">Add</button>
					</form>
					</div>
					<br/>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Flight ID</th>
								<th>Plane Name</th>
								<th>Route ID</th>
								<th>Date</th>
								<th>Departure Time</th>
								<th>Luggage</th>
								<th>Economy Price</th>
								<th>Business Price</th>
								<th>Delay(minutes)</th>
								<th>Crew</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>

						<?PHP

							$servername = '127.0.0.1';
							$user = 'root';
							$pass = 'mfs12';
							$dbname = 'airline';

							$con = mysqli_connect($servername, $user, $pass, $dbname);

							if (mysqli_connect_errno())
							{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}

							$sql = "SELECT * FROM flight";
							$result = mysqli_query($con,$sql);

							$html = "";
							if($result)
							{
								if ($result->num_rows > 0)
								{
									// output data of each row
									while($row = $result->fetch_assoc()) {
										$flight_id = $row['flight_id'];
										$html = $html 	.	"<tr>"
														.	"<td>". $row['flight_id'] . "</td>"
														.	"<td>". $row["plane_name"] . "</td>"
														.	"<td>". $row["route_id"] . "</td>"
														.	"<td>". $row["date"] . "</td>"
														.	"<td>". $row["departure_time"] . "</td>"
														.	"<td>". $row["luggage"] . "</td>"
														.	"<td>". $row["economy_price"]  . "</td>"
														.	"<td>". $row["business_price"]  . "</td>"
														.	"<td>". $row["delay"] . "</td>"
														.   "<td>". "<a href='index.php?function=1&flight_id=$flight_id'><button class='glyphicon glyphicon-user'></button></a>". "</td>"
														.   "<td>". "<a href='index.php?function=1&flight_id=$flight_id'><button class='glyphicon glyphicon-edit'></button></a>". "</td>"
														.   "<td>". "<a href='flight_delete.php?flight_id=$flight_id'><button class='glyphicon glyphicon-remove'></button></a>". "</td>"
														.	"</tr>";
									}
								} else {
									echo "";
								}
							}
							echo $html;
						?>

						</tbody>
					</table>

			</div>

		</div>
	</div>

	<!-- Modal1 -->
		<div class="modal fade" id="crewModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
			 <div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Assign Crew</h4>
					</div>
					<div class="modal-body">

						<form class="form-signin">

								<label for="formp1" > Captain </label>
								<select class="form-control" id="formp1">
									<option>Pilot1</option>
									<option>Pilot1</option>
									<option>Pilot1</option>
									<option>Pilot1</option>
								</select>

								<label for="formp2" > 2nd Pilot </label>
								<select class="form-control" id="formp2">
									<option>Pilot1</option>
									<option>Pilot1</option>
									<option>Pilot1</option>
									<option>Pilot1</option>
								</select>

								<label for="formp3" > 3nd Pilot</label>
								<select class="form-control" id="formp3">
									<option>Pilot1</option>
									<option>Pilot1</option>
									<option>Pilot1</option>
									<option>Pilot1</option>
								</select>

								<label for="formc1" > Cabin Chief </label>
								<select class="form-control" id="formc1">
									<option>C1</option>
									<option>C2</option>
									<option>C3</option>
									<option>C4</option>
								</select>

								<label for="formc2" > Flight attendant </label>
								<select class="form-control" id="formc2">
									<option>C1</option>
									<option>C2</option>
									<option>C3</option>
									<option>C4</option>
								</select>

								<label for="formc3" > Flight attendant </label>
								<select class="form-control" id="formc3">
									<option>C1</option>
									<option>C2</option>
									<option>C3</option>
									<option>C4</option>
								</select>

								<label for="formc4" > Flight attendant </label>
								<select class="form-control" id="formc4">
									<option>C1</option>
									<option>C2</option>
									<option>C3</option>
									<option>C4</option>
								</select>

						<br/>
						<button type="button" class="btn btn-lg btn-danger" data-dismiss="modal">Close</button>
						<button class="btn btn-lg btn-success" type="submit">Save</button>

					  </form>

					</div> <!-- /container -->
				</div>
			</div>
		</div>

	<!-- Modal2 -->
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
			 <div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Edit Flight</h4>
					</div>
					<div class="modal-body">

						<form class="form-signin">

						<label for="flightDelay" style = "color:red;" >Give Delay </label>
						<input type="text" id="flightDelay" class="form-control" placeholder="Delay in mins" required="" >


						<label for="flightNo" >Flight No </label>
						<input type="text" id="flightNo" class="form-control" placeholder="ACXXX" required="">

						<label for="routeID" >Route ID </label>
						<input type="text" id="routeID" class="form-control" placeholder="RXXXXXXX" required="">

						<label for="planeName">PlaneName</label>
						<input type="text" id="formto" class="form-control" placeholder="The Spirit" required="">


						<label>Meals </label>
						<br/>
						<label class="checkbox-inline"><input type="checkbox" value="">Option 1</label>
						<label class="checkbox-inline"><input type="checkbox" value="">Option 2</label>
						<label class="checkbox-inline"><input type="checkbox" value="">Option 3</label>
						<br/>
						<br/>
						<label for="flighttime" >Date&Time </label>
						<input type="datetime" id="flighttime" class="form-control" placeholder="2016-01-01" required="">
						<br/>

						<label for="flightluggage" >Luggage </label>
						<input type="text" id="flightluggage" class="form-control" placeholder="10000" required="">

						<label for="priceecon" >Price For Economy </label>
						<input type="text" id="priceecon" class="form-control" placeholder="750" required="">

						<label for="pricebusi" >Price For Business </label>
						<input type="text" id="pricebusi" class="form-control" placeholder="1500" required="">
						<br/>
						<button class="btn btn-lg" type="submit">Save</button>
						</form>

					</div> <!-- /container -->
				</div>
			</div>
		</div>
</body>
</html>
