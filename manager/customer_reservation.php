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
				<li><button type="button" class="btn btn-primary">LOG OUT</button></li>
			</ul>

		</header>

        <?PHP
            $name = $_GET['user_name'];
            echo "<h1> Info of User $name</h1>"
        ?>

		<div class="row">
			<!-- First ticket -->
			<div class="panel panel-success">
				<div class="panel-heading">Bought Flight - X days X hrs left to flight
					<button type ="button" class="btn btn-danger pull-right btn-xs" >RETURN</button>

				</div>
				<div class="panel-body">

					<table class="table">
						<thead>
							<tr>
								<td> From </td>
								<td> To</td>
								<td> Total Duration </td>
								<td> Departure Time</td>
								<td> Arrival Time</td>
								<td> Luggage </td>
								<td> Class </td>
							</tr>
						</thead>
						<tr>
							<td> Ankara(ESB) </td>
							<td> Munich(MUC)</td>
							<td> 4 hrs 32 mins</td>
							<td> 11/11/1111 : 88:88</td>
							<td> 11/11/1111 : 88:88</td>
							<td> No extra luggage</td>
							<td> Economy </td>
						</tr>
					</table>

							<button class="btn btn-default" data-toggle="collapse" data-target="#f1"> Details </button>

							<div id="f1" class="collapse">
								<table class="table">
									<thead>
										<tr>
											<td> Flight No </td>
											<td> Ticket No </td>
											<td> From </td>
											<td> To</td>
											<td> Duration </td>
											<td> Departure Time</td>
											<td> Arrival Time</td>
											<td> Seat</td>
											<td> Meal</td>
											<td> Class </td>
										</tr>
									</thead>
									<tr>
										<td> TK 1111</td>
										<td> T3468731</td>
										<td> Ankara(ESB) </td>
										<td> Istanbul(XXX)</td>
										<td> 0 hrs 32 mins</td>
										<td> 11/11/1111 : 88:00</td>
										<td> 11/11/1111 : 88:35</td>
										<td> 1A </td>
										<td> Beef </td>
										<td> Economy </td>
									</tr>
									<tr>
										<td> AC 2222</td>
										<td> A22123131</td>
										<td> Istanbul(XXX)</td>
										<td> Munich(Much) </td>
										<td> 3 hrs 25 mins</td>
										<td> 11/11/1111 : 88:35</td>
										<td> 11/11/1111 : 88:35</td>
										<td> 7F </td>
										<td> Beef </td>
										<td> Economy </td>
									</tr>
								</table>
							</div>

				</div>
			</div>

			<!-- Second ticket -->
			<div class="panel panel-success">
				<div class="panel-heading">Bought Flight - X days X hrs left to flight
					<button type ="button" class="btn btn-danger pull-right btn-xs" >RETURN</button>
					<button type ="button" class="btn btn-warning pull-right btn-xs" >Cancel Extra Luggage</button>

				</div>
				<div class="panel-body">

					<table class="table">
						<thead>
							<tr>
								<td> From </td>
								<td> To</td>
								<td> Total Duration </td>
								<td> Departure Time</td>
								<td> Arrival Time</td>
								<td> Luggage </td>
								<td> Class </td>
							</tr>
						</thead>
						<tr>
							<td> Ankara(ESB) </td>
							<td> Munich(MUC)</td>
							<td> 4 hrs 32 mins</td>
							<td> 11/11/1111 : 88:88</td>
							<td> 11/11/1111 : 88:88</td>
							<td> 15 kg extra luggage</td>
							<td> Economy </td>
						</tr>
					</table>

							<button class="btn btn-default" data-toggle="collapse" data-target="#f2"> Details </button>

							<div id="f2" class="collapse">
								<table class="table">
									<thead>
										<tr>
											<td> Flight No </td>
											<td> Ticket No </td>
											<td> From </td>
											<td> To</td>
											<td> Duration </td>
											<td> Departure Time</td>
											<td> Arrival Time</td>
											<td> Seat</td>
											<td> Meal</td>
											<td> Class </td>
										</tr>
									</thead>
									<tr>
										<td> TK 1111</td>
										<td> T3468731</td>
										<td> Ankara(ESB) </td>
										<td> Istanbul(XXX)</td>
										<td> 0 hrs 32 mins</td>
										<td> 11/11/1111 : 88:00</td>
										<td> 11/11/1111 : 88:35</td>
										<td> 1A </td>
										<td> Beef </td>
										<td> Economy </td>
									</tr>
									<tr>
										<td> AC 2222</td>
										<td> A22123131</td>
										<td> Istanbul(XXX)</td>
										<td> Munich(Much) </td>
										<td> 3 hrs 25 mins</td>
										<td> 11/11/1111 : 88:35</td>
										<td> 11/11/1111 : 88:35</td>
										<td> 7F </td>
										<td> Beef </td>
										<td> Economy </td>
									</tr>
								</table>
							</div>

				</div>
			</div>

			<!-- Third ticket -->
			<div class="panel panel-danger">
				<div class="panel-heading">Reserved Flight - X hrs left to cancellation
					<button type ="button" class="btn btn-warning pull-right btn-xs" >CANCEL </button>

				</div>
				<div class="panel-body">

					<table class="table">
						<thead>
							<tr>
								<td> From </td>
								<td> To</td>
								<td> Total Duration </td>
								<td> Departure Time</td>
								<td> Arrival Time</td>
								<td> Class </td>
							</tr>
						</thead>
						<tr>
							<td> Ankara(ESB) </td>
							<td> Munich(MUC)</td>
							<td> 4 hrs 32 mins</td>
							<td> 11/11/1111 : 88:88</td>
							<td> 11/11/1111 : 88:88</td>
							<td> Economy </td>
						</tr>
					</table>

							<button class="btn btn-default" data-toggle="collapse" data-target="#f3"> Details </button>

							<div id="f3" class="collapse">
								<table class="table">
									<thead>
										<tr>
											<td> Flight No </td>
											<td> From </td>
											<td> To</td>
											<td> Total Duration </td>
											<td> Departure Time</td>
											<td> Arrival Time</td>
											<td> Class </td>
										</tr>
									</thead>
									<tr>
										<td> TK 1111</td>
										<td> Ankara(ESB) </td>
										<td> Istanbul(XXX)</td>
										<td> 0 hrs 32 mins</td>
										<td> 11/11/1111 : 88:00</td>
										<td> 11/11/1111 : 88:00</td>
										<td> Economy </td>
									</tr>
									<tr>
										<td> AC 2222</td>
										<td> Istanbul(XXX)</td>
										<td> Munich(Much) </td>
										<td> 3 hrs 25 mins</td>
										<td> 11/11/1111 : 88:35</td>
										<td> 11/11/1111 : 88:35</td>
										<td> Economy </td>
									</tr>
								</table>
							</div>

				</div>
			</div>

			<!-- Fourth ticket -->
			<div class="panel panel-warning">
				<div class="panel-heading">Reserved Flight - X days X hrs left to cancellation
					<button type ="button" class="btn btn-warning pull-right btn-xs" >CANCEL </button>

				</div>
				<div class="panel-body">

					<table class="table">
						<thead>
							<tr>
								<td> From </td>
								<td> To</td>
								<td> Total Duration </td>
								<td> Departure Time</td>
								<td> Arrival Time</td>
								<td> Class </td>
							</tr>
						</thead>
						<tr>
							<td> Ankara(ESB) </td>
							<td> Munich(MUC)</td>
							<td> 4 hrs 32 mins</td>
							<td> 11/11/1111 : 88:88</td>
							<td> 11/11/1111 : 88:88</td>
							<td> Economy </td>
						</tr>
					</table>

							<button class="btn btn-default" data-toggle="collapse" data-target="#f4"> Details </button>

							<div id="f4" class="collapse">
								<table class="table">
									<thead>
										<tr>
											<td> Flight No </td>
											<td> From </td>
											<td> To</td>
											<td> Total Duration </td>
											<td> Departure Time</td>
											<td> Arrival Time</td>
											<td> Class </td>
										</tr>
									</thead>
									<tr>
										<td> TK 1111</td>
										<td> Ankara(ESB) </td>
										<td> Istanbul(XXX)</td>
										<td> 0 hrs 32 mins</td>
										<td> 11/11/1111 : 88:00</td>
										<td> 11/11/1111 : 88:00</td>
										<td> Economy </td>
									</tr>
									<tr>
										<td> AC 2222</td>
										<td> Istanbul(XXX)</td>
										<td> Munich(Much) </td>
										<td> 3 hrs 25 mins</td>
										<td> 11/11/1111 : 88:35</td>
										<td> 11/11/1111 : 88:35</td>
										<td> Economy </td>
									</tr>
								</table>
							</div>

				</div>
			</div>

			<!-- fifth ticket -->
			<div class="panel panel-default">
				<div class="panel-heading">Past Flight</div>
				<div class="panel-body">

					<table class="table">
						<thead>
							<tr>
								<td> From </td>
								<td> To</td>
								<td> Total Duration </td>
								<td> Departure Time</td>
								<td> Arrival Time</td>
								<td> Class </td>
							</tr>
						</thead>
						<tr>
							<td> Ankara(ESB) </td>
							<td> Munich(MUC)</td>
							<td> 4 hrs 32 mins</td>
							<td> 11/11/1111 : 88:88</td>
							<td> 11/11/1111 : 88:88</td>
							<td> Economy </td>
						</tr>
					</table>

							<button class="btn btn-default" data-toggle="collapse" data-target="#f5"> Details </button>

							<div id="f5" class="collapse">
								<table class="table">
									<thead>
										<tr>
											<td> Flight No </td>
											<td> TicketNo </td>
											<td> From </td>
											<td> To</td>
											<td> Total Duration </td>
											<td> Departure Time</td>
											<td> Arrival Time</td>
											<td> Class </td>
										</tr>
									</thead>
									<tr>
										<td> TK1233 </td>
										<td> T3468731</td>
										<td> Ankara(ESB) </td>
										<td> Munich(MUC)</td>
										<td> 4 hrs 32 mins</td>
										<td> 11/11/1111 : 88:88</td>
										<td> 11/11/1111 : 88:88</td>
										<td> Economy </td>
									</tr>
									<tr>
										<td> AC1300 </td>
										<td> A22123131</td>
										<td> Ankara(ESB) </td>
										<td> Munich(MUC)</td>
										<td> 4 hrs 32 mins</td>
										<td> 11/11/1111 : 88:88</td>
										<td> 11/11/1111 : 88:88</td>
										<td> Economy </td>
									</tr>
								</table>
							</div>

				</div>
			</div>
		</div>
	</div>

</body>
</html>
