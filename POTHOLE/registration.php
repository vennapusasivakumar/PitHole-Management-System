<?php
error_reporting( error_reporting() & ~E_NOTICE )
?>
<?php
 session_start();
 include_once "index.html";
 include_once("conn.php");

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.login h1 {
  	text-align: center;
  	color: #5b6574;
  	font-size: 20px;
  	padding: 15px 0 15px 0;
  	
}
.login form {
  	display: flex;
  	flex-wrap: wrap;
  	justify-content: center;
  	padding-top: 20px;
}
.login form label {
  	display: flex;
  	justify-content: center;
  	align-items: center;
  	width: 50px;
  	height: 50px;
  	background-color: #0056b3;
  	color: #ffffff;
}
.login form input[type="password"], .login form input[type="text"] {
  	width: 310px;
  	height: 50px;
  	border: 1px solid #dee0e4;
  	margin-bottom: 20px;
  	padding: 0 15px;
}
.login form input[type="submit"] {
  	width: 100%;
  	padding: 15px;
 	margin-top: 20px;
  	background-color: #0056b3;
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
  	transition: background-color 0.2s;
}


</style>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		<div class="login">
			<h4><center>New Registration</center></h4>
			<form action="registration.php" method="post">
				
				<label for="Contact No">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="contact" placeholder="VALID Contact NO" id="username" required>
				<label for="Password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="email" placeholder="Password" id="password" required>
				<?php
include 'conn.php';
if(isset($_POST["submit"]))
	{
		$_SESSION["contact"] = $_POST["contact"];
		$_SESSION["email"] = $_POST["email"];
				
		if(!empty($_POST['contact']) && !empty($_POST['email']))
		{
			$contact = $_POST['contact'];
			$email = $_POST['email'];
			$query = mysqli_query($conn, "insert into authentication(contact,email,status)values('$contact','$email','0')");
			if($query===TRUE)
			{
				echo "<strong><font color='red'><center>SUCCESSFULLY REGISTERED<color><br><a href='token.php?=Raise New Token'>Go 4 Login Page</a></center></strong>";
			}
		}
	}
?>
<input type="submit" name="submit" value='New Registration'>
			</form>
		</div>
	</body>
</html>
<br>
