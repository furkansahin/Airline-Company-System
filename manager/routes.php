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
			header('Refresh: 2; URL=routes.php');
		}
		if($_GET['function'] == 3 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#deleteSuccess').modal('show');
				});
				</script>";		
			header('Refresh: 2; URL=routes.php');
		}	
		if($_GET['function'] == 4 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#deleteFail').modal('show');
				});
				</script>";		
			header('Refresh: 2; URL=routes.php');
		}
		if($_GET['function'] == 5 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#createSuccess').modal('show');
				});
				</script>";		
			header('Refresh: 2; URL=routes.php');
		}
		if($_GET['function'] == 6  )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#createFail').modal('show');
				});
				</script>";		
			header('Refresh: 2; URL=routes.php');
		}			
	}
	
?>


<body>
	
	<div class = "wrapper">
		<header>
		
			<ul>
				<li>Welcome Manager</li>
				<li><button type="button" class="btn btn-primary">LOG OUT</button></li>
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
							<li><a href="index.html">Flights</a></li>
							<li class="active"><a href="routes.html">Routes</a></li>
							<li><a href="crews.html">Crews</a></li>
							<li><a href="airports.php">Airports</a></li>	
							<li><a href="customers.html">Customers</a></li>
							<li><a href="flights.html">Flight Information</a></li>
							<li><a href="planes.html">Planes</a></li>
						</ul>
					 </div><!-- /.navbar-collapse -->
				</nav>
			</div>
			
			<div class="col-sm-10">
				
					<h2>ROUTES</h2>
					<h3><button class="btn btn-lg btn-primary " data-toggle="collapse" data-target="#demo"><i class="glyphicon glyphicon-plus"></i>Add Route </button></h2>
					
					<div id="demo" class="collapse">
					<form class="form-signin" action='routes_add.php' method='POST'>
						<label for="routecode" >Route ID</label>
						<input type="text" name='routecode' id='routecode' class="form-control" placeholder="RTXXXXXXXX" required="">
							
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
							
							$sql = "SELECT * FROM airport";
							$result = mysqli_query($con,$sql);
							
							$selection1 = "";
							$selection2 = "";
							
							if($result)
							{
								if ($result->num_rows > 0) 
								{
									// output data of each row
									while($row = $result->fetch_assoc()) {
										$selection1 = $selection1 	.	"<option>"
														.	$row["airport_id"]
														.	"("
														.	$row["city_name"]
														.	" )"
														.	"</option>";
										$selection2 = $selection2 	.	"<option>"
														.	$row["airport_id"]
														.	"("
														.	$row["city_name"]
														.	" )"
														.	"</option>";
									}
								} else {
									echo "";
								}
							}
							$html = "<label for='routedepart' >Departure Airport </label>"
									."<select name='routedepart' id='routedepart'  class='form-control' placeholder='Please Select'>"
									."<option value='' selected disabled>Please select</option>"
									.$selection1
									."</select>"
									."<label for='routearrive' >Arrival Airport </label>"
									."<select name='routearrive' id='routearrive'  class='form-control' placeholder='Please Select'>"
									."<option value='' selected disabled>Please select</option>"
									.$selection2
									."</select>";
							
							echo $html;
						?>
						
						<!-- <input type="text" name='aircity' id='aircity'  class="form-control" placeholder="eng chars only" required=""> -->
						
						<label for="routeduration" >Duration </label>
						<input type="text" name='routeduration' id='routeduration' class="form-control" placeholder="DD:HH:MM" required="">
						
						<label for="routedistance" >Distance </label>
						<input type="text" name='routedistance' id='routedistance' class="form-control" placeholder="Distance in Miles" required="">
						
						<br/>
						<input type='submit' name='Submit' value='Submit' class='btn btn-primary'/>
					</form>	
					</div>
					<br/>          
					<table class="table table-striped">
						
						<thead>
							<tr>
								<th>Route ID</th>
								<th>Departs</th>
								<th>Arrives</th>
								<th>Duration</th>
								<th>Distance</th>
								<th>Edit</th>
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
							
							$sql = "SELECT * FROM route";
							$result = mysqli_query($con,$sql);
							
							$html = "";
							if($result)
							{
								if ($result->num_rows > 0) 
								{
									// output data of each row
									while($row = $result->fetch_assoc()) {
										$id = $row['route_id'];
										$html = $html 	.	"<tr>"
														.	"<td>". $row["route_id"] . "</td>"
														.	"<td>". $row["departs"] . "</td>"
														.	"<td>". $row["arrives"] . "</td>"
														.	"<td>". $row["flight_duration"] . "</td>"
														.	"<td>". $row["total_mile"] . "</td>"
														.   "<td>". "<a href='routes.php?function=1&id=$id'><span class='glyphicon glyphicon-edit'></span></a>". "</td>"
														.   "<td>". "<a href='routes_remove.php?id=$id'><span class='glyphicon glyphicon-trash'></span></a>". "</td>"
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
	
	<!-- Modal Edit -->
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Edit Route</h4>
				</div>
				<div class="modal-body">

					<form class="form-signin" action='routes_update.php' method='POST'>
					<?PHP
						$id = $_GET['id'];
						$servername = "localhost";
						$user = "root";
						$pass = "mfs12";
						$dbname = "airline";
						
						$con = mysqli_connect($servername, $user, $pass, $dbname);

						if (mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}
						
						$sql = "SELECT * FROM route WHERE '$id' = route_id";
						$result = mysqli_query($con,$sql);
						
						if ($result->num_rows > 0) 
						{
							while($row = $result->fetch_assoc()) {									
											$departs =	$row['departs'];
											$arrives =	$row['arrives'];
											$duration=	$row['flight_duration'];
											$mile=	$row['total_mile'];												
							}
						}
						$html = "<label for='routecode' >Route ID </label>
						<input type='text' name='routecode' id='routecode' class='form-control' value='$id' required='' readonly='readonly'>
						
						<label for='routedepart' >Departure </label>
						<input type='text' name='routedepart' id='routedepart' class='form-control' value='$departs' required='' readonly='readonly'>
						
						<label for='routearrive' >Arrival </label>
						<input type='text' name='routearrive' id='routearrive' class='form-control' value='$arrives' required='' readonly='readonly'>
						
						<label for='routeduration' >Duration </label>
						<input type='text' name='routeduration' id='routeduration' class='form-control' value='$duration' required=''>
						
						<label for='routedistance' > Capacity </label>
						<input type='text' name='routedistance' id='routedistance' class='form-control' value='$mile' required=''>";
						echo $html;
					?>	
						<br/>
						<button class="btn btn-default" data-dismiss="modal">Close</button>
						<input type='submit' name='Submit' value='Submit' class='btn btn-primary'/>
					</form>	
					
				</div> <!-- /container -->
			</div>
		</div>
	</div>
	
	<!-- Airport Delete -->
	<div class="modal fade" id="editSuccess" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p>Your changes have been saved.  </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>
	
	<!-- Airport Create -->
	<div class="modal fade" id="createSuccess" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p>Airport is added. </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>
	
	<!-- Airport Create -->
	<div class="modal fade" id="createFail" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p>Route cannot be added, there may be duplication or missing data in dependent tables.</p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>
	<!-- Airport Delete -->
	<div class="modal fade" id="deleteSuccess" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Route has been deleted successfully, you will be redirected </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>
	
	<!-- Modal1 -->
	<div class="modal fade" id="deleteFail" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Route cannot be deleted, there may be assigned routes. You will be redirected </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>
	
</body>
</html>
