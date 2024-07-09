<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="dlog.css">
</head>
<body>
    <div class="c">
		
	<div class="container">
		<a href="../home.html" class="hom">Home</a>

		<?php
            if(isset($_POST['dlogin']))
            {
	            $duser = $_POST['username'];
	            $dpass = $_POST['password'];

	            $con=mysqli_connect("localhost","root","","hospital");
	            if(mysqli_connect_errno())
	            {
	            	echo"could not connect";
	            	exit;
	            }

                $qr="select * from doctor where duser='$duser' and status='Deactive'";
	            $rsl=$con->query($qr);
                $r=$rsl->num_rows;
                if($r!=0)
	            {
                    echo "<b><center><h3>Doctor is Deactive</h3></center></b>";
	            }
                else
                {
	            $qry="select * from doctor where duser='$duser' and dpass='$dpass'";
	            $rslt=$con->query($qry);
	            if($rslt->num_rows!=0)
	            {
					$_SESSION['ds']=$duser;
	            	header("Location:ddash.html");
	            }
	            else
	            {
	            	echo "<b><center><h3>invalid username/password</h3></center></b>";
	            }
                $con->close();
				}
            }
            ?>
		  <h2>Doctor Login</h2>
		<form action="" method="POST">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required>

			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>

			<button type="submit" name="dlogin">Login</button>
		</form>
	</div>
</div>
</body>
</html>