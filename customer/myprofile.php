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
<?PHP

	session_start();
	if(isset($_SESSION['is_logged_in']))
	{
		if($_SESSION['is_logged_in'] != 3)
		{
			header("Location:../index.php");
		}
	}
?>
<?PHP
	if (isset($_GET['f'])){
		if($_GET['f'] == 1){
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#wrongPass').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=myprofile.php');
		}
		if($_GET['f'] == 2){
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#changesOkey').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=myprofile.php');
		}
		if($_GET['f'] == 3){
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#passwordOkey').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=myprofile.php');
		}
		if($_GET['f'] == 4){
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#passwordFail').modal('show');
				});
				</script>";
			header('Refresh: 2; URL=myprofile.php');
		}
	}
?>
<body>
	
	<div class = "wrapper">
		
		<header class="small">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="reservations.html">Reservations</a></li>
					<li><a class="active" href="myprofile.php"><?PHP echo $_SESSION['name']; ?></a></li>
					<li><a href="../logout.php">Log Out</a></li>
				</ul>
		</header>		
		
		<div id = "breaksection2" style="height:50px;">
		</div>
		<div class="row">
			<div class="col-sm-6">
		
				
					<form class="form-signin" action='myprofile_update.php' method='POST'>
					<?PHP
						$servername = "localhost";
						$user = "root";
						$pass = "mfs12";
						$dbname = "airline";
						
						$id = $_SESSION['id'];
						
						$con = mysqli_connect($servername, $user, $pass, $dbname);

						if (mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}
						
						$sql = "SELECT * FROM customer WHERE user_name='$id'";
						$result = mysqli_query($con,$sql);
						$con->close();
						
						if($result)
						{
							if ($result->num_rows > 0) 
							{
								// output data of each row
								while($row = $result->fetch_assoc()) {
									$password = $row["password"];
									$name = $row["name"];
									$birthdate = $row["birthdate"];
									$passport_no = $row["passport_no"];
									$mile_sum = $row["mile_sum"];
									$total_money = $row["total_money"];
								}
							} else {
								echo "";
							}
						}
						$html = "
						<label for='formuname' >UserName </label>
						<input type='text' id='formuname' name='formuname' class='form-control' value='$id' readonly='readonly'>
						
						<label for='formuname2' >Name </label>
						<input type='text' id='formuname2' name='formuname2' class='form-control' value='$name' required = ''>
						
						
						<label for='formupass' >Password </label>
						<input type='password' id='formupass' name='formupass'  class='form-control'  required = ''>
						
						<label for='formrepas1' >New Password </label>
						<input type='password' id='formrepas1' name='formrepas1' class='form-control' placeholder='New Password' >
						
						<label for='formrepas2' >Repeat New Password </label>
						<input type='password' id='formrepas2' name='formrepas2' class='form-control' placeholder='New Password' >
						
						
						<label for='formbirth' >Birthdate </label>
						<input type='date' id='formbirth' name='formbirth' class='form-control' value ='$birthdate' required=''>
						
						<label for='formpassport' >Passport Number </label>
						<input type='text' id='formpassport' name='formpassport' class='form-control' value ='$passport_no' required=''>
						<br/>
						<label >Current Mile Sum : $mile_sum </label>
						<br/>
						<label >Current Balance: $total_money </label>
						<br/><br/>

						<a href='index.php' class='btn btn-warning'>Exit without Changes</a>	  
						<input type='submit' name='Submit' value='Submit' class='btn btn-primary'/>";
						
						echo $html;
					
					?>
					</form>
			</div>
		</div>
	</div>
		
	<!-- Modal1 -->
	<div class="modal fade" id="wrongPass" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> The password you entered is wrong.</p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>	
	
	<!-- Modal2 -->
	<div class="modal fade" id="changesOkey" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Your changes has been saved.</p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>	
	
	<!-- Modal3 -->
	<div class="modal fade" id="passwordOkey" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> Your password has been changed, your changes has been saved.</p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>	
	
	<!-- Modal4 -->
	<div class="modal fade" id="wrongPass" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		 <div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<p> The new passwords you entered does not match.</p>
				</div> <!-- /content -->
			</div>
		</div>
	</div>		
</body>
</html>
