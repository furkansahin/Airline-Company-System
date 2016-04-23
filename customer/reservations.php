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




</head>
<?php
	if(isset($_GET['function']))
	{
		if($_GET['function'] == 1 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#removeR').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=reservations.php');
		}
		if($_GET['function'] == 2 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#removeT').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=reservations.php');
		}
		if($_GET['function'] == 3 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#removeFail').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=reservations.php');
		}
		if($_GET['function'] == 4 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#changeSeat').modal('show');
				});
				</script>";
		}
		if($_GET['function'] == 5 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#buyExtraLuggage').modal('show');
				});
				</script>";
		}
		if($_GET['function'] == 6 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#changeMeal').modal('show');
				});
				</script>";
		}
		if($_GET['function'] == 7 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#applyPromotion').modal('show');
				});
				</script>";
		}
		if($_GET['function'] == 8){
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#chooseMealS').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=reservations.php');
		}
		if($_GET['function'] == 9){
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#chooseMealF').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=reservations.php');
		}
		if($_GET['function'] == 10){
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#extraLuggageS').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=reservations.php');
		}
		if($_GET['function'] == 11){
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#extraLuggageF').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=reservations.php');
		}
		if($_GET['function'] == 12){
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#applyPromotionS').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=reservations.php');
		}
		if($_GET['function'] == 13){
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#applyPromotionF').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=reservations.php');
		}
	}
?>
<body>

	<div class = "wrapper">

		<header class="small">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a class="active" href="reservations.php">Reservations</a></li>
					<li><a href="myprofile.php">My Profile</a></li>
					<li><a href="../logout.php">Log Out</a></li>
				</ul>
		</header>

		<div id = "breaksection2" style="height:50px;">
		</div>
		<div class="row">
			<!-- First ticket -->
			<?PHP
				error_reporting(E_ERROR | E_PARSE);
				session_start();
				$name = $_SESSION['id'];

				$servername = "127.0.0.1";
				$user = "root";
				$pass = "mfs12";
				$dbname = "airline";

				$con = mysqli_connect($servername, $user, $pass, $dbname);

				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}


				$sql = "SELECT * FROM ticket NATURAL JOIN route NATURAL JOIN flight WHERE user_name='".$name."';";

				$tickets = mysqli_query($con, $sql);


				$sql = "SELECT * FROM reservation NATURAL JOIN route NATURAL JOIN flight WHERE user_name='".$name."';";

				$reservations = mysqli_query($con, $sql);

				$count = 1;
				$html = "";
				if($reservations)
				{
					if (mysqli_num_rows($reservations) > 0)
					{
						$temp = $reservations;
						// output data of each row
						while($row = mysqli_fetch_array($temp, MYSQL_ASSOC)) {

							$today = date("Y-m-d");

							if (strtotime($row['date']) > strtotime($today))
							{
								$html = $html 	.	"<div class=\"panel panel-success\">"
												.	"<div class=\"panel-heading\">Reserved Flight"

												.	"<form action=\"remove.php?\">"
												.	"<input name=\"type\" type=\"hidden\" value=\"r\">"
												.	"<input name=\"user_name\" type=\"hidden\" value=\"".$name."\">"
												.	"<input name=\"id\" type=\"hidden\" value=\"".$row['reservation_no']."\">"
												.	"<input style=\"margin-top: -20px;\" type =\"submit\" value=\"RETURN\" "
												.	"class=\"btn btn-danger pull-right btn-xs\" >"
												.	"</form>"

												.	"<a style=\"margin-top: -20px;\" href=\"reservations.php?function=4&val=".$row['reservation_no']."&type=t\""
												.	" class=\"btn btn-warning pull-right btn-xs\">Change Seat</a>"


												.	"</div>";

							}
							if (strtotime($row['date']) == strtotime($today)){
								$html = $html	.	"<div class=\"panel panel-danger\">"
												.	"<div class=\"panel-heading\">Reserved Flight"
												.	"<a href='remove.php?user_name=".$name."&type=r&id=".$row['reservation_no']
												.	"' class=\"glyphicon glyphicon-trash pull-right\">CANCEL</a></div"

												.	"<form action=\"remove.php?\">"
												.	"<input name=\"type\" type=\"hidden\" value=\"r\">"
												.	"<input name=\"user_name\" type=\"hidden\" value=\"".$name."\">"
												.	"<input name=\"id\" type=\"hidden\" value=\"".$row['reservation_no']."\">"
												.	"<input style=\"margin-top: -20px;\" type =\"submit\" value=\"RETURN\" "
												.	"class=\"btn btn-danger pull-right btn-xs\" >"
												.	"</form>";
							}
							if (strtotime($row['date']) < strtotime($today)){
								$html = $html	.	"<div class=\"panel panel-default\">"
												.	"<div class=\"panel-heading\">Past Flight</div>";
							}

							$html = $html	.	"<div class=\"panel-body\"><table class=\"table\">"
											.	"	<thead>
														<tr>
															<td> From </td>
															<td> To</td>
															<td> Total Duration </td>
															<td> Departure Time</td>
															<td> Date</td>
															<td> Class </td>
														</tr>
													</thead>
													<tr>
														<td>"
											.				$row['departs']
											.			"</td>"
											.			"<td>"
											.				$row['arrives']
											.			"</td>"
											.			"<td>"
											.				$row['flight_duration']
											.			"</td>"
											.			"<td>"
											.				$row['departure_time']
											.			"</td>"
											.			"<td>"
											.				$row['date']
											.			"</td>"
											.			"<td>"
											.				$row['class']
											.			"</td></tr></table>";
							$html = $html	.	"<button class=\"btn btn-default\" data-toggle=\"collapse\" data-target=\"#f$count\"> Details </button>";
							$html = $html 	.	"<div id=\"f$count\" class=\"collapse\">
													<table class=\"table\">
														<thead>
															<tr>
																<td> Flight No </td>
																<td> Reservation No </td>
																<td> From </td>
																<td> To</td>
																<td> Duration </td>
																<td> Departure Time</td>
																<td> Date </td>
																<td> Meals </td>
																<td> Class </td>
															</tr>
														</thead>
														<tr>";
							$html = $html	.	"<td>"	.	$row['flight_id']		.	"</td>"
											.	"<td>"	.	$row['reservation_no']	.	"</td>"
											.	"<td>"	.	$row['departs']			.	"</td>"
											.	"<td>"	.	$row['arrives']			.	"</td>"
											.	"<td>"	.	$row['flight_duration']	.	"</td>"
											.	"<td>"	.	$row['departure_time']	.	"</td>"
											.	"<td>"	.	$row['date']			.	"</td>"
											.	"<td>"	.	$row['meals']			.	"</td>"
											.	"<td>"	.	$row['class']			.	"</td>"
											.	"</tr></table></div></div></div>";
							$count++;
						}

					}
				}
				if($tickets)
				{
					if (mysqli_num_rows($tickets) > 0)
					{
						$temp = $tickets;
						// output data of each row
						while($row = mysqli_fetch_array($temp, MYSQL_ASSOC)) {

							$today = date("Y-m-d");

							if (strtotime($row['date']) > strtotime($today))
							{
								$html = $html 	.	"<div class=\"panel panel-success\">"
												.	"<div class=\"panel-heading\">Bought Flight"

												.	"<form action=\"remove.php?\">"
												.	"<input name=\"type\" type=\"hidden\" value=\"t\">"
												.	"<input name=\"user_name\" type=\"hidden\" value=\"".$name."\">"
												.	"<input name=\"id\" type=\"hidden\" value=\"".$row['ticket_no']."\">"
												.	"<input style=\"margin-top: -20px;\" type =\"submit\" value=\"RETURN\" "
												.	"class=\"btn btn-danger pull-right btn-xs\" >"
												.	"</form>"

												.	"<a style=\"margin-top: -20px;\" href=\"reservations.php?function=4&val=".$row['ticket_no']."&type=t\""
												.	" class=\"btn btn-warning pull-right btn-xs\">Change Seat</a>"

												.	"<a style=\"margin-top: -20px;\" href=\"reservations.php?function=5&val=".$row['ticket_no']."&type=t\""
												.	" class=\"btn btn-warning pull-right btn-xs\">Buy Extra Luggage</a>"


												.	"<a style=\"margin-top: -20px;\" href=\"reservations.php?function=6&val=".$row['ticket_no']."&type=t\""
												.	" class=\"btn btn-warning pull-right btn-xs\">Change Meal</a>"


												.	"<a style=\"margin-top: -20px;\" href=\"reservations.php?function=7&val=".$row['ticket_no']."&type=t\""
												.	" class=\"btn btn-success pull-right btn-xs\">Apply Promotion</a>"

												.	"</div>";

							}
							if (strtotime($row['date']) == strtotime($today)){
								$html = $html	.	"<div class=\"panel panel-danger\">"
												.	"<div class=\"panel-heading\">Bought Flight"
												.	"<a style=\"margin-top: -20px;\" href='remove.php?user_name=".$name."&type=r&id=".$row['reservation_no']
												.	"' class=\"glyphicon glyphicon-trash pull-right\">CANCEL</a></div"

												.	"<form action=\"remove.php?\">"
												.	"<input name=\"type\" type=\"hidden\" value=\"t\">"
												.	"<input name=\"user_name\" type=\"hidden\" value=\"".$name."\">"
												.	"<input name=\"id\" type=\"hidden\" value=\"".$row['ticket_no']."\">"
												.	"<input style=\"margin-top: -20px;\" type =\"submit\" value=\"RETURN\" "
												.	"class=\"btn btn-danger pull-right btn-xs\" >"
												.	"</form>";
							}
							if (strtotime($row['date']) < strtotime($today)){
								$html = $html	.	"<div class=\"panel panel-default\">"
												.	"<div class=\"panel-heading\">Past Flight</div>";
							}

							$html = $html	.	"<div class=\"panel-body\"><table class=\"table\">"
											.	"	<thead>
														<tr>
															<td> From </td>
															<td> To</td>
															<td> Total Duration </td>
															<td> Departure Time</td>
															<td> Date</td>
															<td> Class </td>
														</tr>
													</thead>
													<tr>
														<td>"
											.				$row['departs']
											.			"</td>"
											.			"<td>"
											.				$row['arrives']
											.			"</td>"
											.			"<td>"
											.				$row['flight_duration']
											.			"</td>"
											.			"<td>"
											.				$row['departure_time']
											.			"</td>"
											.			"<td>"
											.				$row['date']
											.			"</td>"
											.			"<td>"
											.				$row['class']
											.			"</td></tr></table>";
							$html = $html	.	"<button class=\"btn btn-default\" data-toggle=\"collapse\" data-target=\"#f$count\"> Details </button>";
							$html = $html 	.	"<div id=\"f$count\" class=\"collapse\">
													<table class=\"table\">
														<thead>
															<tr>
																<td> Flight No </td>
																<td> Ticket No </td>
																<td> From </td>
																<td> To</td>
																<td> Duration </td>
																<td> Departure Time</td>
																<td> Date </td>
																<td> Meal</td>
																<td> Extra Luggage </td>
																<td> Class </td>
															</tr>
														</thead>
														<tr>";
							$html = $html	.	"<td>"	.	$row['flight_id']		.	"</td>"
											.	"<td>"	.	$row['ticket_no']		.	"</td>"
											.	"<td>"	.	$row['departs']			.	"</td>"
											.	"<td>"	.	$row['arrives']			.	"</td>"
											.	"<td>"	.	$row['flight_duration']	.	"</td>"
											.	"<td>"	.	$row['departure_time']	.	"</td>"
											.	"<td>"	.	$row['date']			.	"</td>"
											.	"<td>"	.	$row['meal']			.	"</td>"
											.	"<td>"	.	$row['extra_luggage']	.	"</td>"
											.	"<td>"	.	$row['class']			.	"</td>"
											.	"</tr></table></div></div></div>";
							$count++;
						}

					}
				}
				$html = $html	.	"</div>";
				echo $html;
			?>
			<!-- Buy Extra Luggage -->
			<div class="modal fade" id="buyExtraLuggage" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel"> Buy Extra Luggage</h4>
						</div>
						<div class="modal-body">

							<form class="form-signin" action='extraLuggageAdd.php' method='POST'>
								<?PHP
									$tr_id = $_GET['val'];
									$type = $_GET['type'];
									echo "<input name=\"id\" type=\"hidden\" value=\"".$tr_id."\">";
									echo "<input name=\"type\" type=\"hidden\" value=\"".$type."\">";
								?>
								<div class='col-sm-6'>
									<label for='extraLuggage' >Extra Luggage </label>
									<select name='extraLuggage' id='extraLuggage'  class='form-control' placeholder='Please Select' required=''>
										<option value='' selected disabled>Please select</option>
										<option value='5'>5</option>
										<option value='10'>10</option>
										<option value='15'>15</option>
										<option value='20'>20</option>
									</select>
								</div>
								<br/>
								<br/>
								<br/>
								<br/>
								<input type='submit' name='Submit' value='Add' class='btn btn-primary center-block'/>
						  	</form>

						</div> <!-- /container -->
					</div>
				</div>
			</div>

			<!-- Choose Meal -->
			<div class="modal fade" id="changeMeal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Choose Meal</h4>
						</div>
						<div class="modal-body">

							<form class="form-signin" action='chooseMeal.php' method='POST'>
								<label>Meals </label>
								<br/>
								<?PHP
									$tr_id = $_GET['val'];
									$type = $_GET['type'];
									echo "<input name=\"id\" type=\"hidden\" value=\"".$tr_id."\">";
									echo "<input name=\"type\" type=\"hidden\" value=\"".$type."\">";
								?>
								<label class="checkbox-inline"><input name="meal" type="radio" value="Beef">Beef</label>
								<br/>
								<label class="checkbox-inline"><input name="meal" type="radio" value="Salad">Salad</label>
								<br/>
								<label class="checkbox-inline"><input name="meal" type="radio" value="Pasta">Pasta</label>
								<br/>
								<label class="checkbox-inline"><input name="meal" type="radio" value="Chicken">Chicken</label>
								<br/>
								<br/>
								<input type='submit' name='Submit' value='Add' class='btn btn-primary'/>
						  	</form>

						</div> <!-- /container -->
					</div>
				</div>
			</div>

			<!-- Apply Promotion -->
			<div class="modal fade" id="applyPromotion" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Apply Promotion</h4>
						</div>
						<div class="modal-body">

							<form class="form-signin" action='applyPromotion.php' method='POST'>
								<?PHP
									session_start();
									$t_id = $_GET['val'];
									$type = $_GET['type'];
									$u_name= $_SESSION["id"];
									$servername = "127.0.0.1";
									$user = "root";
									$pass = "mfs12";
									$dbname = "airline";

									$con = mysqli_connect($servername, $user, $pass, $dbname);

									if (mysqli_connect_errno())
									{
										echo "Failed to connect to MySQL: " . mysqli_connect_error();
									}

									$sql = "SELECT * FROM sale WHERE user_name='$u_name'";

									$result = mysqli_query($con, $sql);
									$html = "";

									if (mysqli_num_rows($result) > 0){
										$html = $html 	.	"<label> Sales </label><br/>";
									}
									while ($row = mysqli_fetch_assoc($result)){
										$html = $html	.	"<label class=\"checkbox-inline\">"
														.	"<input name=\"promotion\" type=\"radio\" value=\""
														.	$row['promotion_id']
														.	"\"> ".$row['sale_amount']."% Discount! Last "
														.	$row['sale_period']." days!</label>"
														.	"<br/><br/>";

									}
									$sql = "SELECT * FROM campaign WHERE user_name='$u_name'";

									$result = mysqli_query($con, $sql);
									if (mysqli_num_rows($result) > 0){
										$html = $html 	.	"<label> Free Tickets </label><br/>";
									}
									while ($row = mysqli_fetch_assoc($result)){
										if (strcmp($row['campaign_type'], "Free1") == 0){
											$html = $html	.	"<label class=\"checkbox-inline\">"
															.	"<input name=\"promotion\" type=\"radio\" value=\""
															.	$row['promotion_id']
															.	"\"> Free ticket to Europe!</label>"
															.	"<br/><br/>";
										}
										if (strcmp($row['campaign_type'], "Free2") == 0){
											$html = $html	.	"<label class=\"checkbox-inline\">"
															.	"<input name=\"promotion\" type=\"radio\" value=\""
															.	$row['promotion_id']
															.	"\"> Free ticket for domestic flights!</label>"
															.	"<br/><br/>";
										}
									}

									echo "<input name=\"id\" type=\"hidden\" value=\"".$t_id."\">";
									echo "<input name=\"type\" type=\"hidden\" value=\"".$type."\">";
									echo $html;

								?>

								<br/>

								<input type='submit' name='Submit' value='Add' class='btn btn-primary'/>
						  	</form>

						</div> <!-- /container -->
					</div>
				</div>
			</div>

			<!-- Reservation Cancel -->
			<div class="modal fade" id="removeR" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<p>Reservation is canceled. </p>
						</div> <!-- /content -->
					</div>
				</div>
			</div>

			<!-- Ticket Cancel -->
			<div class="modal fade" id="removeT" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<p>Ticket is returned.</p>
						</div> <!-- /content -->
					</div>
				</div>
			</div>
			<!-- Cancellation Fail -->
			<div class="modal fade" id="removeFail" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<p> Return process is failed.</p>
						</div> <!-- /content -->
					</div>
				</div>
			</div>
			<!-- ChooseMeal Success -->
			<div class="modal fade" id="chooseMealS" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<p>The meal is chosen successfully.</p>
						</div> <!-- /content -->
					</div>
				</div>
			</div>
			<!-- Cancellation Fail -->
			<div class="modal fade" id="chooseMealF" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<p> The meal cannot be chosen.</p>
						</div> <!-- /content -->
					</div>
				</div>
			</div>
			<!-- ExtraLuggage Success -->
			<div class="modal fade" id="extraLuggageS" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<p>Extra Luggage is added successfully.</p>
						</div> <!-- /content -->
					</div>
				</div>
			</div>
			<!-- Cancellation Fail -->
			<div class="modal fade" id="extraLuggageF" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<p> Extra Luggage cannot be added.</p>
						</div> <!-- /content -->
					</div>
				</div>
			</div>
			<!-- ApplyPromotion Success -->
			<div class="modal fade" id="applyPromotionS" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<p>Promotion is applied successfully.</p>
						</div> <!-- /content -->
					</div>
				</div>
			</div>
			<!-- ApplyPromotion Fail -->
			<div class="modal fade" id="applyPromotionF" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<p> Promotion cannot be applied.</p>
						</div> <!-- /content -->
					</div>
				</div>
			</div>
	</body>
</html>
