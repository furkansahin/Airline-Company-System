<?PHP
	
	if(isset($_GET['function']))
	{		
		if($_GET['function'] == 1 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#addSuccess').modal('show');
				});
				</script>";
				header('Refresh: 2; URL=index.php');
			
		}
		if($_GET['function'] == 2 )
		{
			echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#addFail').modal('show');
				});
				</script>";	
				header('Refresh: 2; URL=register.php');
		}			
	}
	
?>
	<div class = "wrapper">

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
	
		
		<header class="small">
				<ul>
					<li><a href="index.html">Home</a></li>
				</ul>
		</header>		
		
		<div id = "breaksection" style="height:50px;">
		</div>
		<div class="row">
			<div class="col-sm-6">
					
			<div class="modal fade" id="addSuccess" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<p> Account is added. </p>
						</div> <!-- /content -->
					</div>
				</div>
			</div>
			<div class="modal fade" id="addFail" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
				 <div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<p> Account cannot be created, there may be duplication or missing data in dependent tables. </p>
						</div> <!-- /content -->
					</div>
				</div>
			</div>
		
					<form class="form-signin" action='register_add.php' method='POST'>

						<label for="formuname" >UserName </label>
						<input type="text" name = "username" id="formuname" class="form-control" placeholder="Username" required >
						
						<label for="formupass" >Name </label>
						<input type="text" name = "name" id="formupass" class="form-control" placeholder= "Your Name" required >
						
						<label for="formrepas1" >Password </label>
						<input type="password" name = "psw" id="formrepas1" class="form-control" placeholder="New Password" required >
						
						<label for="formrepas2" >Repeat Password </label>
						<input type="password" name = "psw2" id="formrepas2" class="form-control" placeholder="New Password" required >
						
						
						<label for="formbirth" >Birthdate </label>
						<input type="date" name = "bdate" id="formbirth" class="form-control" placeholder ="1111-11-11" required >
						
						<label for="formpassport" >Passport Number </label>
						<input type="text" name = "passport" id="formpassport" class="form-control" placeholder ="A0000000" required >
						
						<br/>
						<input type='submit' name='Submit' value='Submit' onclick="submitform()" class='btn btn-primary'/> 
					</form>	
			</div>
		</div>
	</div>

	
	

</body>
</html>
