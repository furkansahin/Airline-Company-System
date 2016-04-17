<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">

	<title> Customer Page </title>
	
	
	<!-- CSS Files -->
	<link rel="stylesheet" type="text/css" href="http://meyerweb.com/eric/tools/css/reset/reset.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
	<!-- JS Files - Jquery Bootstrap -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	
	<!-- Datetime pickler -->
	<script type="text/javascript" src="../bower_components/moment/min/moment.min.js"></script>
	<script type="text/javascript" src="../bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<link rel="stylesheet" href="../bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
	
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
	
	if(isset($_GET['function']))
	{		
		if($_GET['function'] == 1 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#success1').modal('show');
				});
				</script>";		
		}
		header('Refresh: 2; URL=index.php');
	}
?>
<body>
	<div class = "wrapper">
					
		<header class="large">
				<ul>
					<li><a class="active" href="index.html">Home</a></li>
					<li><a href="reservations.html">Reservations</a></li>
					<li><a href="myprofile.html">My Profile</a></li>
					<li><a href="../index.html">Log Out</a></li>
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
								$html = "<div class='col-sm-6'><label for='searchdepart' >Departure Airport </label>"
									."<select name='searchdepart' id='searchdepart'  class='form-control' placeholder='Please Select'>"
									."<option value='' selected disabled>Please select</option>"
									.$selection1
									."</select></div><div class='col-sm-6'>"
									."<label for='searcharrive' >Arrival Airport </label>"
									."<select name='searcharrive' id='searcharrive'  class='form-control' placeholder='Please Select'>"
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
										<input type='text' name='searchdate1' id='searchdate1' class="form-control"/>
										<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
							</div>
							
							<div class='col-md-6'>
								<label for="datetimepicker7">Return Date:</label>
									<div class='input-group date' id='datetimepicker7'>
										<input type='text' name='searchdate2' id='searchdate2' class="form-control"/>
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
									<select name='searchClass' id='searchClass'  class="form-control" placeholder="Please Select">
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
						<!-- To and from row -->
						<div class="row">
						
							<div class="col-sm-6">
								<div class="form-group">
									<label for="sel1">To:</label>
									<select class="form-control" id="sel1">
									<option>Ankara ESB</option>
									<option>İstanbul</option>
									<option>Münih</option>
									<option>Kars</option>
									 </select>
								</div>
							</div>
							
							<div class="col-sm-6">
								<div class="form-group">
									<label for="sel2">From:</label>
									<select class="form-control" id="sel2">
									<option>İstanbul</option>
									<option>Ankara ESB</option>
									<option>Münih</option>
									<option>Kars</option>
									</select>
								</div>
							</div>	  
						</div>
							
						<!-- Row of dates -->
						<div class="row">
						
							<div class='col-md-6'>
								<label for="datetimepicker6">Departure Date:</label>
								<div class="form-group">
									<div class='input-group date' id='datetimepicker6'>
										<input type='text' class="form-control" />
										<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
							</div>
							
							<div class='col-md-6'>
								<label for="datetimepicker7">Return Date:</label>
								<div class="form-group">
									<div class='input-group date' id='datetimepicker7'>
										<input type='text' class="form-control" disabled />
										<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
							</div>
							
							<script type="text/javascript">
									$(function () {
										$('#datetimepicker6').datetimepicker();
										$('#datetimepicker7').datetimepicker({
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
							<div class="col-md-8 col-md-offset-2">
								<label for="formClass" > Class </label>
									<select class="form-control" id="formClass">
										<option>Economy</option>
										<option>Business</option>
								</select> 
							</div>						
						</div>
						<br/>
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<a href="searchflights.html" class="btn btn-lg btn-primary btn-block" >Search</a>
							</div>	
						</div>		
					</div>
				</div>	
			</div>
		
			<!-- Right ad -->
			<div class='col-md-6'>
			
				<img src= "../img/sample1.jpg" class="img-responsive">
			
			</div>
			
		</div> <!-- End of first row -->
		
		<!-- Second row for ads -->
		<div class = "row">
			<div class='col-md-6'>
			
				<img src= "../img/sample2.jpg" class="img-responsive">
			
			</div>

			<div class='col-md-6'>
			
				<img src= "../img/sample2.jpg" class="img-responsive">
			
			</div>
		</div>
		
		<div id = "breaksection">
				
		</div>
		<div id = "breaksection">
				
		</div>
		<div id = "breaksection">
				
		</div>

	</div><!-- End of wrapper -->
	
	<!-- Modal1 -->
	<div class="modal fade" id="success1" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Your purchase is successful, you can see it from Reservations page </p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>
</body>
</html>
