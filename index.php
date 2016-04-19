<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<title> AirLine Corp </title>


	<!-- CSS Files -->
	<link rel="stylesheet" type="text/css" href="http://meyerweb.com/eric/tools/css/reset/reset.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!-- JS Files - Jquery Bootstrap -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


	<!-- Datetime pickler -->
	<script type="text/javascript" src="bower_components/moment/min/moment.min.js"></script>
	<script type="text/javascript" src="bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<link rel="stylesheet" href="bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />

	<!-- Collapsing header with scroll down -->

	<script type="text/javascript">
		$(document).on("scroll",function(){
			if($(document).scrollTop()>100){
				$("header").removeClass("large").addClass("small");
				}
			else{
				$("header").removeClass("small").addClass("large");
				}
			});
	</script>

</head>
<?PHP
	session_start();
	if(isset($_SESSION['is_logged_in']))
	{
		if($_SESSION['is_logged_in'] == 1)
		{
			header("Location:manager/index.php");
		}
		else if($_SESSION['is_logged_in'] == 2)
		{
			header("Location:salesperson/index.php");
		}
		else if($_SESSION['is_logged_in'] == 3)
		{
			header("Location:customer/index.php");
		}
		else
		{
			header('Location: index.php?r=1');
		}
	}
?>
<?PHP
	if (isset($_GET['r'])){
		if($_GET['r'] == 1){
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#loginFailed').modal('show');
				});
				</script>";
		}
	}
?>
<body>
	<div class = "wrapper">

		<header class="large">
				<ul>
					<li><a href="#" data-toggle="modal" data-target="#basicModal" >Log In</a></li>
					<li><a href="register.php">Register</a></li>
				</ul>
		</header>

		<div id = "breaksection2" style ="height:150px">

		</div>
		<div id = "breaksection2">
				<a name="linked">
				<div id="linked">
				</div>
			</a>
		</div>

		<!-- Search and right adv -->
		<div class="row">


			<div class="col-sm-6">

				<!-- Start of tabs -->
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#home">Round Trip</a></li>
					<li><a data-toggle="tab" href="#menu1">One Way</a></li>
				</ul>
				<div class="tab-content">
					<h3>Please Choose</h3>

					<!-- First tab -->
					<div id="home" class="tab-pane fade in active">
						<form class="form-signin" action='searchflights1.php' method='POST'>
						<!-- To and from row -->
						<div class="row">

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

								$sql = "SELECT * FROM airport";
								$result = mysqli_query($con,$sql);
								$con->close();
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
								$html = "<div class='col-sm-6'><label for='searchdepart' >Departure Airport </label>"
									."<select name='searchdepart' id='searchdepart'  class='form-control' placeholder='Please Select' required=''>"
									."<option value='' selected disabled>Please select</option>"
									.$selection1
									."</select></div><div class='col-sm-6'>"
									."<label for='searcharrive' >Arrival Airport </label>"
									."<select name='searcharrive' id='searcharrive'  class='form-control' placeholder='Please Select' required=''>"
									."<option value='' selected disabled>Please select</option>"
									.$selection2
									."</select></div>";

								echo $html;
							?>
						</div>

						<!-- Row of dates -->
						<div class="row">

							<div class='col-md-6'>
								<label for="datetimepicker6">Departure Date:</label>
									<div class='input-group date' id='datetimepicker6'>
										<input type='text' name='searchdate1' id='searchdate1' class="form-control"/ required=''>
										<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
							</div>

							<div class='col-md-6'>
								<label for="datetimepicker7">Return Date:</label>
									<div class='input-group date' id='datetimepicker7'>
										<input type='text' name='searchdate2' id='searchdate2' class="form-control"/ required=''>
										<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
							</div>

							<script type="text/javascript">
									$(function () {
										$('#datetimepicker6').datetimepicker({
											format: 'YYYY-MM-DD /HH:mm'
										});
										$('#datetimepicker7').datetimepicker({
											format: 'YYYY-MM-DD /HH:mm',
											useCurrent: false //Important! See issue #1075
										});
										$("#datetimepicker6").on("dp.change", function (e) {
											$('#datetimepicker7').data("DateTimePicker").minDate(e.date);
										});
										$("#datetimepicker7").on("dp.change", function (e) {
											$('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
										});
									});
							</script>
						</div>
						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								<label for="searchClass" > Class </label>
									<select name='searchClass' id='searchClass'  class="form-control" placeholder="Please Select" required=''>
										<option value="" selected disabled>Please select</option>
										<option>Economy</option>
										<option>Business</option>
								</select>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<input type='submit' name='Submit' value='Submit' class='btn btn-primary'/>
							</div>
						</div>

						</form>
					</div>	<!-- End of first tab -->

					<!-- Second tab -->
					<div id="menu1" class="tab-pane fade">
					<form class="form-signin" action='searchflights2.php' method='POST'>
						<!-- To and from row -->
						<div class="row">

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

								$sql = "SELECT * FROM airport";
								$result = mysqli_query($con,$sql);
								$con->close();
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
								$html = "<div class='col-sm-6'><label for='searchdepart2' >Departure Airport </label>"
									."<select name='searchdepart2' id='searchdepart2'  class='form-control' placeholder='Please Select' required=''>"
									."<option value='' selected disabled>Please select</option>"
									.$selection1
									."</select></div><div class='col-sm-6'>"
									."<label for='searcharrive2' >Arrival Airport </label>"
									."<select name='searcharrive2' id='searcharrive2'  class='form-control' placeholder='Please Select' required=''>"
									."<option value='' selected disabled>Please select</option>"
									.$selection2
									."</select></div>";

								echo $html;
							?>
						</div>

						<!-- Row of dates -->
						<div class="row">

							<div class='col-md-6'>
								<label for="datetimepicker9">Departure Date:</label>
									<div class='input-group date' id='datetimepicker9'>
										<input type='text' name='searchdate3' id='searchdate3' class="form-control" required=''/>
										<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
							</div>

							<div class='col-md-6'>
								<label for="datetimepicker10">Return Date:</label>
									<div class='input-group date' id='datetimepicker10' >
										<input type='text' name='searchdate4' id='searchdate4' class="form-control" readonly='readonly' />
										<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
							</div>

							<script type="text/javascript">
									$(function () {
										$('#datetimepicker9').datetimepicker({
											format: 'YYYY-MM-DD /HH:mm'
										});
										$('#datetimepicker10').datetimepicker({
											format: 'YYYY-MM-DD /HH:mm',
											useCurrent: false //Important! See issue #1075
										});
										$("#datetimepicker9").on("dp.change", function (e) {
											$('#datetimepicker10').data("DateTimePicker").minDate(e.date);
										});
										$("#datetimepicker10").on("dp.change", function (e) {
											$('#datetimepicker9').data("DateTimePicker").maxDate(e.date);
										});
									});
							</script>
						</div>
						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								<label for="searchClass2" > Class </label>
									<select name='searchClass2' id='searchClass2'  class="form-control" placeholder="Please Select" required=''>
										<option value="" selected disabled>Please select</option>
										<option>Economy</option>
										<option>Business</option>
								</select>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<input type='submit' name='Submit' value='Submit' class='btn btn-primary'/>
							</div>
						</div>

						</form>
					</div>
				</div>
			</div>

			<!-- Right ad -->
			<div class='col-md-6'>

				<img src= "img/sample1.jpg" class="img-responsive">

			</div>

		</div> <!-- End of first row -->

		<div id = "breaksection2">

		</div>

		<!-- Second row for ads -->
		<div class = "row">
			<div class='col-md-6'>

				<img src= "img/sample2.jpg" class="img-responsive">

			</div>

			<div class='col-md-6'>

				<img src= "img/sample2.jpg" class="img-responsive">

			</div>
		</div>

		<div id = "breaksection">

		</div>
		<div id = "breaksection">

		</div>
		<div id = "breaksection">

		</div>

	</div><!-- End of wrapper -->


	<!-- Modal for login -->
	<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">User Login</h4>
				</div>
				<div class="modal-body">

					<form class="form-signin" action='login.php' method='POST'>
					<label for="user_name" class="sr-only">User Name</label>
					<input type="text" name='user_name' id='user_name' class="form-control" placeholder="User Name" required="" autofocus="">
					<label for="inputPassword" class="sr-only">Password</label>
					<input type="password" name='inputPassword' id='inputPassword' class="form-control" placeholder="Password" required="">
					<input type='submit' name='Submit' value='Sign In' class='btn btn-primary'/>
				  </form>

				</div> <!-- /container -->
			</div>
		</div>
	</div>
	<div class="modal fade" id="loginFailed" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p>Login Failed!</p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>
</body>
</html>
