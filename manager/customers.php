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
			header('Refresh: 2; URL=customers.php');
		}
		if($_GET['function'] == 3 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#deleteSuccess').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=customers.php');
		}
		if($_GET['function'] == 4 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#deleteFail').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=customers.php');
		}
		if($_GET['function'] == 5 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#createSuccess').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=customers.php');
		}
		if($_GET['function'] == 6  )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#createFail').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=customers.php');
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
							<li><a href="index.html">Flights</a></li>
							<li><a href="routes.html">Routes</a></li>
							<li><a href="crews.html">Crews</a></li>
							<li><a href="airports.php">Airports</a></li>
							<li class="active"><a href="customers.php">Customers</a></li>
							<li><a href="flights.html">Flight Information</a></li>
							<li><a href="planes.html">Planes</a></li>
						</ul>
					 </div><!-- /.navbar-collapse -->
				</nav>
			</div>

			<div class="col-sm-8">

					<h2>CUSTOMERS</h2>
					<br/>
					<h3><button class="btn btn-lg btn-default "><i class="glyphicon glyphicon-filter"></i>Show Customers with + 10.000 miles </button></h3>

					<div id="demo" class="collapse">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Username</th>
								<th>Name</th>
								<th>Birthdate</th>
								<th>Total Miles</th>
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

								$sql = "SELECT * FROM customer WHERE mile_sum > 10000";
								$result = mysqli_query($con,$sql);

								$html = "";
								if($result)
								{
									if ($result->num_rows > 0)
									{
										// output data of each row
										while($row = $result->fetch_assoc()) {
										$user_name = $row['user_name'];
										$html = $html 	.	"<tr>"
														.	"<td>". $row['user_name'] . "</td>"
														.	"<td>". $row['name'] . "</td>"
														.	"<td>". $row['birthdate'] . "</td>"
														.	"<td>". $row['mile_sum'] . "</td>"
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
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Username</th>
								<th>Name</th>
								<th>Birthdate</th>
								<th>Total Miles</th>
								<th>Reservations</th>
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

							$sql = "SELECT * FROM customer";
							$result = mysqli_query($con,$sql);

							$html = "";
							if($result)
							{
								if ($result->num_rows > 0)
								{
									// output data of each row
									while($row = $result->fetch_assoc()) {
										$user_name = $row['user_name'];
										$html = $html 	.	"<tr>"
														.	"<td>". $row['user_name'] . "</td>"
														.	"<td>". $row['name'] . "</td>"
														.	"<td>". $row['birthdate'] . "</td>"
														.	"<td>". $row['mile_sum'] . "</td>"
														.   "<td>". "<a href='customer_reservation.php?user_name=$user_name'><span class='glyphicon glyphicon-list-alt'></span></a>". "</td>"
														.   "<td>". "<a href='customer_remove.php?function=3&user_name=$user_name'>Remove</a>". "</td>"
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
	<!-- Customer Delete -->
	<div class="modal fade" id="deleteSuccess" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Customer has been deleted successfully, you will be redirected </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>

</body>
</html>
