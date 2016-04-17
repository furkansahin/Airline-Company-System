<?php
	define('DB_SERVER', 'localhost'); //name of server
   define('DB_USERNAME', 'root'); //username
   define('DB_PASSWORD', 'mfs12'); //password 
   define('DB_DATABASE', 'airline'); //connection

   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

 	if (isset($_POST['Button'])) {
      
      		$username = mysqli_real_escape_string($db,$_POST['username']);
      		$name = mysqli_real_escape_string($db,$_POST['name']);
      		$password = mysqli_real_escape_string($db,$_POST['password']);
      		$password2 = mysqli_real_escape_string($db,$_POST['password2']);
      		$birth = mysqli_real_escape_string($db,$_POST['birth']);
      		$passport = mysqli_real_escape_string($db,$_POST['passport']);

      		if($username == "") {
				$message = "You did not enter your user name!";
				echo "<script type='text/javascript'>alert('$message');</script>";
	        }else if($name == "") {
				$message = "You did not enter your name!";
				echo "<script type='text/javascript'>alert('$message');</script>";
	        }else if($password == "") {
				$message = "You did not enter your password!";
				echo "<script type='text/javascript'>alert('$message');</script>";
	        }else if($password2 == "") {
				$message = "You should enter your password again!";
				echo "<script type='text/javascript'>alert('$message');</script>";
	        }else if($password2 != $password ) {
				$message = "Please check your password entries again!";
				echo "<script type='text/javascript'>alert('$message');</script>";
	        }else{
	        	$sql = "select user_name from customer where user_name = '$username';";
				$result = mysqli_query($db,$sql);
				if($result->num_rows != 0 ) {
		        	$message = "This user name is currently used by another customer. Please select another user name!";
					echo "<script type='text/javascript'>alert('$message');</script>";
	       		 }
	       		else{
	        	
		        	$sql = "select user_name from customer;";
					$result = mysqli_query($db,$sql);
		        	$sql = "INSERT INTO customer VALUES ( '$username', '$password', '$name', '$birth', NULL, '$passport', 0, 500 );";
					$result2 = mysqli_query($db,$sql);
					$sql = "select user_name from customer;";
					$result2 = mysqli_query($db,$sql);
					if( $result2->num_rows > $result->num_rows ){
						$message = "You are registered to the system";
						echo "<script type='text/javascript'>alert('$message');</script>";
						header( 'Location: index.html' ) ;
					}
				
	        	}
	        
				
			}
	        
	        
   }
	
?>

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

<body>
	
	<div class = "wrapper">
		
		<header class="small">
				<ul>
					<li><a href="index.html">Home</a></li>
				</ul>
		</header>		
		
		<div id = "breaksection2" style="height:50px;">
		</div>
		<div class="row">
			<div class="col-sm-6">
		
		
					<form method= "post" class="form-signin">
						<label for="formuname" >UserName </label>
						<input type="text" id="formuname" class="form-control" name = "username" placeholder="Username">
						
						<label for="formupass" >Name </label>
						<input type="text" id="formupass" class="form-control" name = "name" placeholder = "Your Name" >
						
						<label for="formrepas1" >Password </label>
						<input type="password" id="formrepas1" class="form-control" name = "password" placeholder="New Password" >
						
						<label for="formrepas2" >Repeat Password </label>
						<input type="password" id="formrepas2" class="form-control" name = "password2" placeholder="New Password" >
						
						
						<label for="formbirth" >Birthdate </label>
						<input type="date" id="formbirth" class="form-control" name = "birth" placeholder ="1111-11-11" required="">
						
						<label for="formpassport" >Passport Number </label>
						<input type="text" id="formpassport" class="form-control" name = "passport" placeholder ="A0000000" required="">
						
						<br/>

						<button class="btn btn-lg" name= "Button" type="submit">Register</button>	  
					</form>	
			</div>
		</div>
	</div>	
</body>
</html>
