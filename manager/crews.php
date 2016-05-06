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
				<li><button type="button" class="btn btn-primary">LOG OUT</button></li>
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
							<li class="active"><a href="crews.php">Crews</a></li>
							<li><a href="airports.php">Airports</a></li>	
							<li><a href="customers.php">Customers</a></li>
							<li><a href="flights.php">Flight Information</a></li>
							<li><a href="planes.php">Planes</a></li>
						</ul>
					 </div><!-- /.navbar-collapse -->
				</nav>
			</div>
			
			<div class="col-sm-8">
				
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#pilots">Pilots</a></li>
					<li><a data-toggle="tab" href="#atts">Flight attendants</a></li>
				</ul>

				<div class="tab-content">
									
					<div id="pilots" class="tab-pane fade in active">
						
						<h3>Pilots</h3>
						<h3><button class="btn btn-lg btn-primary " data-toggle="collapse" data-target="#demo3"><i class="glyphicon glyphicon-plus"></i> Add a pilot </button></h2>
							
						<div id="demo3" class="collapse">
							<form class="form-signin" action='pilot_add.php' method='POST'>
							
							<label for="pilotid"> StaffId </label>
							<input type="text" name = "pilotid" id="pilotid" class="form-control" placeholder="1111111" required="">
							
							<label for="pilotname"> Name </label>
							<input type="text" name = "pilotname" id="pilotname" class="form-control" placeholder="Sample Pilot" required="">
							
							<label for="pilotsalary"> Salary </label>
							<input type="text" name = "pilotsalary" id="pilotsalary" class="form-control" placeholder="4000$" required="">
							
							<label for="pilotbdate"> Birthdate </label>
							<input type="date" name = "pilotbdate" id="pilotbdate" class="form-control" placeholder="XX/XX/XXXX" required="">
							
							<label for="pilotgender"> Gender </label>
							<input type="text" name = "pilotgender" id="pilotgender" class="form-control" placeholder="M/F" required="">
							
							<label for="pilotphone"> Phone </label>
							<input type="text" name = "pilotphone" id="pilotphone" class="form-control" placeholder="+90XXXXXXXXXX" required="">
							
							<label for="pilotlicense"> LicenseNo </label>
							<input type="text" name = "pilotlicense" id="pilotlicense" class="form-control" placeholder="XXXXXXXXX" required="">
							
							<label for="pilotrank"> Rank </label>
							<input type="text" name = "pilotrank" id="pilotrank" class="form-control" placeholder="XXX" required="">
							
							<label for="pilotmax"> Maximum Flight Distance </label>
							<input type="text" name = "pilotmax" id="pilotmax" class="form-control" placeholder="XX.XXX" required="">

							
							<br/>
							<input type='submit' name='AddPilot' value='Submit' onclick="submitform()" class='btn btn-primary'/> 
							</form>	
						</div>
						<br/>          
						<table class="table table-striped">
							<thead>
								<tr>
									<th>StaffID</th>
									<th>Name</th>
									<th>Salary</th>
									<th>BirthDate</th>
									<th>Gender</th>
									<th>Phone</th>
									<th>LicanseNo</th>
									<th>Rank</th>
									<th>Maximum Flight Distance</th>
									<th>Edit</th>
								</tr>
							</thead>
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
							
							$sql = "SELECT  staff.staff_id, name, salary, birthdate, gender, phone, license_no, rank, max_flight_distance FROM (staff natural join crew natural join pilot) left OUTER JOIN staffphones ON staff.staff_id = staffphones.staff_id;";
							$result = mysqli_query($con,$sql);
							

							$html = "";
							if($result)
							{
								if ($result->num_rows > 0) 
								{
									// output data of each row
									while($row = $result->fetch_assoc()) {
										$id = $row['staff_id'];
										$html = $html 	.	"<tr>"
														.	"<td>". $row["staff_id"] . "</td>"
														.	"<td>". $row["name"] . "</td>"
														.	"<td>". $row["salary"] . "</td>"
														.	"<td>". $row["birthdate"] . "</td>"
														.	"<td>". $row["gender"] . "</td>"
														.	"<td>". $row["phone"] . "</td>"
														.	"<td>". $row["license_no"] . "</td>"
														.	"<td>". $row["rank"] . "</td>"
														.	"<td>". $row["max_flight_distance"] . "</td>"
														.   "<td>". "<a href='crews.php?function=9&id=$id'>Edit</a>". "</td>"
														.   "<td>". "<a href='pilot_remove.php?id=$id'>Remove</a>". "</td>"
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
					
					
					<div id="atts" class="tab-pane fade">
						<h3>Attendants</h3>
						<h3><button class="btn btn-lg btn-primary " data-toggle="collapse" data-target="#demo4"><i class="glyphicon glyphicon-plus"></i> Add an attendant </button></h2>
							
						<div id="demo4" class="collapse">
							<form class="form-signin" action='flight_attendance_add.php' method='POST'>
							</select>
							<label for="attendantid"> StaffId </label>
							<input type="text"  name = "attendantid" id="attendantid" class="form-control" placeholder="1111111" required="">
							
							<label for="attendantname"> Name </label>
							<input type="text" name = "attendantname" id="attendantname" class="form-control" placeholder="Sample Attendant" required="">
							
							<label for="attendantsalary"> Salary </label>
							<input type="text" name = "attendantsalary" id="attendantsalary" class="form-control" placeholder="4000$" required="">
							
							<label for="attendantbirthdate"> Birthdate </label>
							<input type="date" name = "attendantbirthdate" id="attendantbirthdate" class="form-control" placeholder="XX/XX/XXXX" required="">
							
							<label for="attendantgender"> Gender </label>
							<input type="text" name = "attendantgender" id="attendantgender" class="form-control" placeholder="M/F" required="">
							
							<label for="attendantphone"> Phone </label>
							<input type="text" name = "attendantphone" id="attendantphone" class="form-control" placeholder="+90XXXXXXXXXX" required="">
							
							<label for="attendantlicense"> LicanseNo </label>
							<input type="text" name = "attendantlicense" id="attendantlicense" class="form-control" placeholder="XXXXXXXXX" required="">
							
							<label for="attendantrank"> Rank </label>
							<input type="text" id="attendantrank" name = "attendantrank" class="form-control" placeholder="XXX" required="">
							
							<label for="attendantclass"> Serving Class</label>
							<input type="text" id="attendantclass" name = "attendantclass" class="form-control" placeholder="E/B" required="">

							
							<br/>
							<button class="btn btn-lg" name='AddAttendant' type="submit">Add</button>
							</form>	
						</div>
						<br/>          
						<table class="table table-striped">
							<thead>
								<tr>
									<th>StaffID</th>
									<th>Name</th>
									<th>Salary</th>
									<th>BirthDate</th>
									<th>Gender</th>
									<th>Phone</th>
									<th>LicanseNo</th>
									<th>Rank</th>
									<td>Class</td>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
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
							
							$sql = "SELECT  staff.staff_id, name, salary, birthdate, gender, phone, license_no, rank, flight_class_served FROM (staff natural join crew natural join flightattendance) left OUTER JOIN staffphones ON staff.staff_id = staffphones.staff_id;";
							$result = mysqli_query($con,$sql);
							

							$html = "";
							if($result)
							{
								if ($result->num_rows > 0) 
								{
									// output data of each row
									while($row = $result->fetch_assoc()) {
										$id = $row['staff_id'];
										$html = $html 	.	"<tr>"
														.	"<td>". $row["staff_id"] . "</td>"
														.	"<td>". $row["name"] . "</td>"
														.	"<td>". $row["salary"] . "</td>"
														.	"<td>". $row["birthdate"] . "</td>"
														.	"<td>". $row["gender"] . "</td>"
														.	"<td>". $row["phone"] . "</td>"
														.	"<td>". $row["license_no"] . "</td>"
														.	"<td>". $row["rank"] . "</td>"
														.	"<td>". $row["flight_class_served"] . "</td>"
														.   "<td>". "<a href='crews.php?function=11&id=$id'>Edit</a>". "</td>"
														.   "<td>". "<a href='flight_attendance_remove.php?id=$id'>Remove</a>". "</td>"
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
			
		</div>
	</div>

	<!-- Edit Pilot Modal-->
	<div class="modal fade" id="editPilot" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Edit Pilot</h4>
				</div>
				<div class="modal-body">

					<form class="form-signin" action='pilot_update.php' method='POST'>
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

						$sql = "SELECT  * FROM staff natural join crew natural join pilot WHERE '$id' = staff_id;";
						$result = mysqli_query($con,$sql);
						$sql = "SELECT  * FROM staffphones WHERE '$id' = staff_id;";
						$result2 = mysqli_query($con,$sql);
						$phone = NULL;
						if ($result->num_rows > 0)
						{
							while($row = $result->fetch_assoc()) {
											$name=		$row['name'];
											$salary =	$row['salary'];
											$bdate =	$row['birthdate'];
											$gender =	$row['gender'];
											$phone =  $result2->fetch_assoc()['phone'];
											$license =	$row['license_no'];
											$rank =	$row['rank'];
											$maxdist =	$row['max_flight_distance'];
							}
						}
						$html = "<label for='staffid' >Staff Id </label>
						<input type='text' name='pilotid' id='staffid' class='form-control' value='$id' required='' readonly='readonly'>

						<label for='name' >Name </label>
						<input type='text' name='pilotname' id='name' class='form-control' value='$name' required='' readonly='readonly'>

						<label for='salary' >Salary </label>
						<input type='text' name='pilotsalary' id='salary' class='form-control' value='$salary' required=''>

						<label for='bdate' >Birthdate </label>
						<input type='text' name='pilotbdate' id='bdate' class='form-control' value='$bdate' required=''>

						<label for='gender' >Gender</label>
						<input type='text' name='pilotgender' id='gender' class='form-control' value='$gender' required=''>

						<label for='phone' >Phone </label>
						<input type='text' name='pilotphone' id='phone' class='form-control' value='$phone' required=''>						

						<label for='license' >License </label>
						<input type='text' name='pilotlicense' id='license' class='form-control' value='$license' required=''>	

						<label for='rank' >Rank </label>
						<input type='text' name='pilotrank' id='rank' class='form-control' value='$rank' required=''>

						<label for='maxDistance' > MaxDistance </label>
						<input type='text' name='pilotmax' id='maxDistance'class='form-control' value='$maxdist' required=''>";
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
	
<div class="modal fade" id="editAttendant" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Edit Attandents Crew</h4>
				</div>
				<div class="modal-body">

					<form class="form-signin" action='flight_attendant_update.php' method='POST'>
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

						$sql = "SELECT  * FROM staff natural join crew natural join flightattendance WHERE '$id' = staff_id;";
						$result = mysqli_query($con,$sql);
						$sql = "SELECT  * FROM staffphones WHERE '$id' = staff_id;";
						$result2 = mysqli_query($con,$sql);
						$phone = NULL;
						if ($result->num_rows > 0)
						{
							while($row = $result->fetch_assoc()) {
											$aname=		$row['name'];
											$asalary =	$row['salary'];
											$abdate =	$row['birthdate'];
											$agender =	$row['gender'];
											$aphone =  $result2->fetch_assoc()['phone'];
											$alicense =	$row['license_no'];
											$arank =	$row['rank'];
											$aclass =	$row['flight_class_served'];
							}
						}
						$html = "


						<label for='staffid' >Staff Id </label>
						<input type='text' name='attendantid' id='attendantstaffid' class='form-control' value='$id' required='' readonly='readonly'>

						<label for='attendantname' >Name </label>
						<input type='text' name='attendantname' id='attendantname' class='form-control' value='$aname' required='' readonly='readonly'>

						<label for='attendantsalary' >Salary </label>
						<input type='text' name='attendantsalary' id='attendantsalary' class='form-control' value='$asalary' required=''>

						<label for='attendantbdate' >Birthdate </label>
						<input type='text' name='attendantbdate' id='attendantbdate' class='form-control' value='$abdate' required=''>

						<label for='attendantgender' >Gender</label>
						<input type='text' name='attendantgender' id='attendantgender' class='form-control' value='$agender' required=''>

						<label for='attendantphone' >Phone </label> 
						<input type='text' name='attendantphone' id='attendantphone' class='form-control' value='$aphone' required=''>						

						<label for='attendantlicense' >License </label>
						<input type='text' name='attendantlicense' id='attendantlicense' class='form-control' value='$alicense' required=''>	

						<label for='attendantrank' >Rank </label>
						<input type='text' name='attendantrank' id='attendantrank' class='form-control' value='$arank' required=''>

						<label for='attendantClass' > Class </label>
						<input type='text' name='attendantclass' id='attendantmaxDistance'class='form-control' value='$aclass' required=''>";
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

	
	
	<!--AddAttendantSuccess-->
	<div class="modal fade" id="addAttendantSuccess" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Flight attendance is successfully added. </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>

	<!--AddAttendantFail-->
	<div class="modal fade" id="addAttendantFail" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Flight attendance cannot be added, there may be duplication or missing data in dependent tables. </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>
	<!--AddPilotSuccess-->
	<div class="modal fade" id="addPilotSuccess" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Pilot is successfully added. </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>

	<!--AddAttendantFail-->
	<div class="modal fade" id="addPilotFail" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Pilot cannot be added, there may be duplication or missing data in dependent tables. </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>
	<!--DeletePilotSuccess-->
	<div class="modal fade" id="deletePilotSuccess" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Pilot is successfully deleted. </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>

	<!--deletePilotFail-->
	<div class="modal fade" id="deletePilotFail" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Pilot cannot be deleted, there may be duplication or missing data in dependent tables. </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>

	<!--DeleteAttendantSuccess-->
	<div class="modal fade" id="deleteAttendantSuccess" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Flight attendant is successfully deleted. </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>

	<!--deletePilotFail-->
	<div class="modal fade" id="deleteAttendantFail" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Flight attendant cannot be deleted, there may be duplication or missing data in dependent tables. </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>

	<!--editPilotSuccess-->
	<div class="modal fade" id="editPilotSuccess" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Your changes are saved. </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>
<!--editPilotSuccess-->
	<div class="modal fade" id="editAttendantSuccess" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Your attendant changes are saved. </p>
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
				$('#addAttendantSuccess').modal('show');
				});
				</script>";		
			//header('Refresh: 2; URL=crews.php');
		}
		if($_GET['function'] == 2  )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#addAttendantFail').modal('show');
				});
				</script>";		
			//header('Refresh: 2; URL=crews.php');
		}
		if($_GET['function'] == 3  )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#addPilotSuccess').modal('show');
				});
				</script>";		
			//header('Refresh: 2; URL=crews.php');
		}
		if($_GET['function'] == 4  )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#addPilotFail').modal('show');
				});
				</script>";		
			//header('Refresh: 2; URL=crews.php');
		}
		if($_GET['function'] == 5  )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#deletePilotSuccess').modal('show');
				});
				</script>";		
			//header('Refresh: 2; URL=crews.php');
		}
		if($_GET['function'] == 6 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#deletePilotFail').modal('show');
				});
				</script>";		
			//header('Refresh: 2; URL=crews.php');
		}	
		if($_GET['function'] == 7  )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#deleteAttendantSuccess').modal('show');
				});
				</script>";		
			//header('Refresh: 2; URL=crews.php');
		}
		if($_GET['function'] == 8 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#deleteAttendantFail').modal('show');
				});
				</script>";		
			//header('Refresh: 2; URL=crews.php');
		}
		if($_GET['function'] == 9 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#editPilot').modal('show');
				});
				</script>";		
			//header('Refresh: 2; URL=crews.php');
		}
		if($_GET['function'] == 10 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#editPilotSuccess').modal('show');
				});
				</script>";		
			//header('Refresh: 2; URL=crews.php');
		}
		if($_GET['function'] == 11 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#editAttendant').modal('show');
				});
				</script>";		
			//header('Refresh: 2; URL=crews.php');
		}
		if($_GET['function'] == 12 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#editAttendantSuccess').modal('show');
				});
				</script>";		
			//header('Refresh: 2; URL=crews.php');
		}
	}
	
?>
