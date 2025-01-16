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
<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		<div class="login">
			<h4><center>Enter Valid Details</center></h4>
			<form action="token.php" method="post">
				<label for="Contact No">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="contact" placeholder="Contact No" id="username" required>
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
			$query = mysqli_query($conn, "SELECT * FROM authentication WHERE contact='".$contact."' AND email='".$email."'");
			$numrows= mysqli_num_rows($query);
			if($numrows!=0)
			{
				$_SESSION['islogin'] = 'Y';
				while($row = mysqli_fetch_assoc($query))
				{
					$username=$row['contact'];
					$pass=$row['email'];
					$status=$row['status'];
					
				}
				if($contact == $username && $pass == $email && $status=='0')
				{
					echo "<script>window.location='user_level.html? = User Report'</script>";
					//header('Location:header_student.php? = student c panel?');				
				}
				elseif($contact == $username && $pass == $email && $status=='1')
				{
					echo "<script>window.location='middle_level.php? = Verification Report'</script>";
					//header('Location:header_student.php? = student c panel?');				
				}
				elseif($contact == $username && $pass == $email && $status=='2')
				{
					echo "<script>window.location='top_level.php? = Approvel Report'</script>";
					//header('Location:header_student.php? = student c panel?');				
				}
			}			
			else
		{
				echo "<br><div style='text-align:center'><div style ='font:12px/21px Arial,Helvetica;color:#ff0000'>Invalid User ID & Password";
			}
		}
	}
?>
				
				<input type="submit" name="submit">
			</form>
		</div>
	</body>
</html>
<br>
