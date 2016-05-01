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

    if (isset($_GET['function'])){
        if($_GET['function'] == 1 )
		{
            echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#updateSuccess').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=planes.php');
		}
        if($_GET['function'] == 2 )
		{
            echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#updateFail').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=planes.php');
		}
        if($_GET['function'] == 3 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#deleteSuccess').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=planes.php');
		}
		if($_GET['function'] == 4 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#deleteFail').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=planes.php');
		}
        if($_GET['function'] == 5 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#createSuccess').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=planes.php');
		}
		if($_GET['function'] == 6  )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#createFail').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=planes.php');
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
							<li><a href="index.html">Flights</a></li>
							<li><a href="routes.html">Routes</a></li>
							<li><a href="crews.html">Crews</a></li>
							<li><a href="airports.php">Airports</a></li>
							<li><a href="customers.html">Customers</a></li>
							<li><a href="flights.html">Flight Information</a></li>
							<li class="active"><a href="planes.html">Planes</a></li>
						</ul>
					 </div><!-- /.navbar-collapse -->
				</nav>
			</div>

			<div class="col-sm-10">

					<h2>PLANES</h2>
					<h3><button class="btn btn-lg btn-primary " data-toggle="collapse" data-target="#demo"><i class="glyphicon glyphicon-plus"></i>Add Plane </button></h2>

					<div id="demo" class="collapse">
					<form class="form-signin" action='planes_add.php' method='POST'>
						<label for="formname" >Name </label>
						<input type="text" name='formname' id='formname' class="form-control" placeholder="withoutspaces,eng chars only" required="">

						<label for="formtype" >Type </label>
							  <select name='formtype' class="form-control" id="formtype" placeholder="Please Select">
                                    <?php
                                        $servername = "127.0.0.1";
                                        $user = "root";
                                        $pass = "mfs12";
                                        $dbname = "airline";
                                        $con = mysqli_connect($servername, $user, $pass, $dbname);

                                        if (mysqli_connect_errno())
                                        {
                                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                        }

                                        $sql = "SELECT plane_type_id FROM planetype";
                                        $result = mysqli_query($con, $sql);

                                        $html = "";
            							if($result)
            							{
            								if ($result->num_rows > 0)
            								{
            									// output data of each row
            									while($row = $result->fetch_assoc()) {
            										$html = $html . "<option>" . $row['plane_type_id'] . "</option>";
            									}
            								} else {
            									echo "";
            								}
            							}
            							echo $html;
                                    ?>
						</select>

						<label for="formavailability" >Availability </label>
                        <select name='formavailability' class="form-control" id="formavailability" placeholder="Please Select">
                            <option>0</option>
                            <option>1</option>
                        </select>
						<br/>
                        <input type='submit' name='Submit' value='Submit' class='btn btn-primary'/>
					</form>
					</div>
					<br/>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Year</th>
								<th>Type</th>
								<th>Economy Capacity</th>
								<th>Business Capacity</th>
								<th>Max Flight Time</th>
								<th>Storage Capacity</th>
								<th>Status</th>
								<th>Send to Repair / Return</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
                            <?PHP
                                $servername = "127.0.0.1";
                                $user = "root";
                                $pass = "mfs12";
                                $dbname = "airline";
                                $con = mysqli_connect($servername, $user, $pass, $dbname);

    							if (mysqli_connect_errno())
    							{
    								echo "Failed to connect to MySQL: " . mysqli_connect_error();
    							}

                                $sql = "SELECT * FROM plane P, planetype T WHERE P.plane_type_id = T.plane_type_id";
                                $result = mysqli_query($con,$sql);

    							$html = "";
    							if($result)
    							{
    								if ($result->num_rows > 0)
    								{
    									// output data of each row
    									while($row = $result->fetch_assoc()) {
    										$id = $row['plane_name'];
    										$html = $html 	.	"<tr>"
    														.	"<td>". $row["plane_name"] . "</td>"
    														.	"<td>". $row["production_year"] . "</td>"
    														.	"<td>". $row["plane_type_id"] . "</td>"
    														.	"<td>". $row["economy_capacity"] . "</td>"
    														.	"<td>". $row["business_capacity"] . "</td>"
                                                            .   "<td>". $row["max_flight_time"] . "</td>"
    														.	"<td>". $row["storage_capacity"] . "</td>"
    														.	"<td>". $row["available"] . "</td>"
    														.   "<td>". "<a href='planes_set_repair.php?id=$id' class=\"glyphicon glyphicon-wrench\"></a>". "</td>"
    														.   "<td>". "<a href='planes_set_repair.php?id=$id' class=\"glyphicon glyphicon-edit\"></a>". "</td>"
    														.   "<td>". "<a href='planes_remove.php?id=$id' class=\"glyphicon glyphicon-trash\"></a>". "</td>"
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
    <!-- Plane Create -->
	<div class="modal fade" id="createSuccess" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p>Plane is added. </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>

	<!-- Plane Create -->
	<div class="modal fade" id="createFail" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p>Plane cannot be added, there may be duplication or missing data in dependent tables.</p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>
    <!-- Plane Update -->
	<div class="modal fade" id="updateSuccess" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Plane has been updated successfully, you will be redirected </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>

	<!-- Modal1 -->
	<div class="modal fade" id="updateFail" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Plane cannot be updated. You will be redirected </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>
    <!-- Plane Delete -->
	<div class="modal fade" id="deleteSuccess" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Plane has been deleted successfully, you will be redirected </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>

	<!-- Modal2 -->
	<div class="modal fade" id="deleteFail" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Plane cannot be deleted, there may be assigned flights. You will be redirected </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>
</body>
</html>
