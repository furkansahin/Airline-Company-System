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
	<title> User Profile </title>
</head>
<body>

	<div class = "wrapper">
		<header style ="position: relative">

			<ul>
				<li>Welcome Manager</li>
				<li><form class="form-signin" action='../logout.php' method='POST'>
					<input type='submit' name='Submit' value='Logout' class='btn btn-primary'/>
				</form></li>
			</ul>

		</header>

        <?PHP
            $name = $_GET['user_name'];
            echo "<h1> Info of User $name</h1>
					<div class=\"row\">";

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
					$temp2 = $tickets;
					// output data of each row
					while($row = mysqli_fetch_array($temp, MYSQL_ASSOC)) {

						$today = date("Y-m-d");

						if (strtotime($row['date']) > strtotime($today))
						{
							$html = $html 	.	"<div class=\"panel panel-success\">"
											.	"<div class=\"panel-heading\">Reserved Flight"
											.	"<a href='reservation_remove.php?type=r&user_name=".$name."&id=".$row['reservation_no']
											.	"' class=\"glyphicon glyphicon-trash pull-right\">RETURN</a>"
											.	"</div>";

						}
						if (strtotime($row['date']) == strtotime($today)){
							$html = $html	.	"<div class=\"panel panel-danger\">"
											.	"<div class=\"panel-heading\">Reserved Flight"
											.	"<a href='reservation_remove.php?user_name=".$name."&type=r&id=".$row['reservation_no']
											.	"' class=\"glyphicon glyphicon-trash pull-right\">CANCEL</a></div";
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
			if ($tickets){
				if (mysqli_num_rows($tickets) > 0){
					$temp2 = $tickets;

					while($row =  mysqli_fetch_array($temp2, MYSQL_ASSOC)) {
						$today = date("Y-m-d");

						if (strtotime($row['date']) > strtotime($today))
						{
							$html = $html 	.	"<div class=\"panel panel-success\">"
											.	"<div class=\"panel-heading\">Bought Flight"
											.	"<a href='reservation_remove.php?type=t&user_name=".$name."&id=".$row['ticket_no']
											.	"' class=\"glyphicon glyphicon-trash pull-right\">RETURN</a></div>";

						}
						if (strtotime($row['date']) == strtotime($today)){
							$html = $html	.	"<div class=\"panel panel-danger\">"
											.	"<div class=\"panel-heading\">Bought Flight"
											.	"<a href='reservation_remove.php?type=t&user_name=".$name."&id=".$row['ticket_no']
											.	"' class=\"glyphicon glyphicon-trash pull-right\">CANCEL</a></div>";
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
														<td> Date </td>
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

			$html = $html	.	"</div></div></body></html>";
			echo $html;
        ?>
