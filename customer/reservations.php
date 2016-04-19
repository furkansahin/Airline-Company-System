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
		}
		if($_GET['function'] == 2 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#removeT').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=index.php');
		}
		if($_GET['function'] == 3 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#removeFail').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=index.php');
		}
	}
?>
<body>

	<div class = "wrapper">

		<header class="small">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a class="active" href="reservations.html">Reservations</a></li>
					<li><a href="myprofile.html">My Profile</a></li>
					<li><a href="../index.html">Log Out</a></li>
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

												.	"<form action=\"remove.php?type=r&"
												.	"user_name=".$name."&id=".$row['reservation_no']
												.	"\"><input style=\"margin-top: -20px;\" type =\"submit\" value=\"RETURN\" "
												.	"class=\"btn btn-danger pull-right btn-xs\" >"
												.	"</form>"

												.	"<a style=\"margin-top: -20px;\" href=\"#\" data-toggle=\"modal\" data-target=\"#changeSeat\""
												.	" class=\"btn btn-warning pull-right btn-xs\">Change Seat</a>"

												.	"<a style=\"margin-top: -20px;\" href=\"#\" data-toggle=\"modal\" data-target=\"#changeSeat\""
												.	" class=\"btn btn-warning pull-right btn-xs\">Buy Extra Luggage</a>"


												.	"<a style=\"margin-top: -20px;\" href=\"#\" data-toggle=\"modal\" data-target=\"#changeSeat\""
												.	" class=\"btn btn-warning pull-right btn-xs\">Change Meal</a>"


												.	"<a style=\"margin-top: -20px;\" href=\"#\" data-toggle=\"modal\" data-target=\"#changeSeat\""
												.	" class=\"btn btn-success pull-right btn-xs\">Apply Promotion</a>"

												.	"</div>";

							}
							if (strtotime($row['date']) == strtotime($today)){
								$html = $html	.	"<div class=\"panel panel-danger\">"
												.	"<div class=\"panel-heading\">Reserved Flight"
												.	"<a href='remove.php?user_name=".$name."&type=r&id=".$row['reservation_no']
												.	"' class=\"glyphicon glyphicon-trash pull-right\">CANCEL</a></div"

												.	"<form action=\"reservation_buy.php?type=r&"
												.	"user_name=".$name."&id=".$row['reservation_no']
												.	"\"><input style=\"margin-top: -20px;\" type =\"submit\" value=\"BUY\" "
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
																<td> Meal</td>
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

												.	"<form action=\"remove.php?type=t&"
												.	"user_name=".$name."&id=".$row['reservation_no']
												.	"\"><input style=\"margin-top: -20px;\" type =\"submit\" value=\"RETURN\" "
												.	"class=\"btn btn-danger pull-right btn-xs\" >"
												.	"</form>"

												.	"<a style=\"margin-top: -20px;\" href=\"#\" data-toggle=\"modal\" data-target=\"#changeSeat\""
												.	" class=\"btn btn-warning pull-right btn-xs\">Change Seat</a>"


												.	"<a style=\"margin-top: -20px;\" href=\"#\" data-toggle=\"modal\" data-target=\"#changeSeat\""
												.	" class=\"btn btn-warning pull-right btn-xs\">Buy Extra Luggage</a>"


												.	"<a style=\"margin-top: -20px;\" href=\"#\" data-toggle=\"modal\" data-target=\"#changeSeat\""
												.	" class=\"btn btn-warning pull-right btn-xs\">Change Meal</a>"


												.	"<a style=\"margin-top: -20px;\" href=\"#\" data-toggle=\"modal\" data-target=\"#changeSeat\""
												.	" class=\"btn btn-success pull-right btn-xs\">Apply Promotion</a>"

												.	"</div>";

							}
							if (strtotime($row['date']) == strtotime($today)){
								$html = $html	.	"<div class=\"panel panel-danger\">"
												.	"<div class=\"panel-heading\">Bought Flight"
												.	"<a style=\"margin-top: -20px;\" href='remove.php?user_name=".$name."&type=r&id=".$row['reservation_no']
												.	"' class=\"glyphicon glyphicon-trash pull-right\">CANCEL</a></div"

												.	"<form action=\"reservation_buy.php?type=r&"
												.	"user_name=".$name."&id=".$row['reservation_no']
												.	"\"><input style=\"margin-top: -20px;\" type =\"submit\" value=\"BUY\" "
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
																<td> Class </td>
															</tr>
														</thead>
														<tr>";
							$html = $html	.	"<td>"	.	$row['flight_id']		.	"</td>"
											.	"<td>"	.	$row['ticket_no']	.	"</td>"
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
				$html = $html	.	"</div>";
				echo $html;
			?>
			<!-- Airport Create -->
			<div class="modal fade" id="removeR" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<p>Reservation is canceled. </p>
						</div> <!-- /content -->
					</div>
				</div>
			</div>

			<!-- Airport Create -->
			<div class="modal fade" id="removeT" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<p>Ticket is returned.</p>
						</div> <!-- /content -->
					</div>
				</div>
			</div>
			<!-- Airport Delete -->
			<div class="modal fade" id="removeFail" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<p> Return process is failed.</p>
						</div> <!-- /content -->
					</div>
				</div>
			</div>
	</body>
</html>
