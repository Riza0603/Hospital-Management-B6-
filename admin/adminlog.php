<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="adlog.css">
</head>
<body>
<div class="login-box">
	<a href="../home.html">Home</a><br>
	
	<?php
if(isset($_POST['adlogin']))
{
	$adusername = $_POST['username'];
	$adpassword = $_POST['password'];

	$con=mysqli_connect("localhost","root","","hospital");
	if(mysqli_connect_errno())
	{
		echo"could not connect";
		exit;
	}
	$qry="select * from admin where username='$adusername' and password='$adpassword'";
	$rslt=$con->query($qry);
	if($rslt->num_rows!=0)
	{
		header("Location:dash.php");
	}
	else
	{
		echo "<b><center><h3>invalid username/password</h3></center></b>";
	}
	$con->close();
}
?>
		<br><h2>Admin Login</h2>
		<form action="" method="POST">
		<div class="user-box">
				<input type="text" name="username" autocomplete="off" required>
				<label>Username</label>
			</div>
			<div class="user-box">
				<input type="password" name="password" autocomplete="off" required>
				<label>Password</label>
			</div>
				<input type="submit" name="adlogin" value="Submit">
		</form>
	</div>
</body>
</html>