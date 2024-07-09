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
    <link rel="stylesheet" href="plog.css">
</head>
<body>
    
        <div class="forms">
            <a href="../home.html" class="home">Home</a>
            <div class="cen">
            <?php
            if(isset($_POST['plogin']))
            {
	            $puser = $_POST['username'];
	            $ppass = $_POST['password'];

                $con=mysqli_connect("localhost","root","","hospital");
	            if(mysqli_connect_errno())
	            {
	            	echo"could not connect";
	            	exit;
	            }

                $qr="select * from patient where puser='$puser' and status='Deactive'";
	            $rsl=$con->query($qr);
                $r=$rsl->num_rows;
                if($r!=0)
	            {
                    echo "<b><center><h3>Patient is Deactive</h3></center></b>";
	            }
                else
                {
	            
	            $qry="select * from patient where puser='$puser' and ppass='$ppass'";
	            $rslt=$con->query($qry);
	            if($rslt->num_rows!=0)
	            {
                    $_SESSION['us']=$puser;
	            	header("Location:pdash.html");
	            }
	            else
	            {
	            	echo "<b><center><h3>invalid username/password</h3></center></b>";
	            }
                $con->close();
                }
            }
            ?>
            <h1>Patient Login</h1>
            <form method="POST">
                <input type="text" class="inputbox" placeholder="user name" name="username" autocomplete="off" required>
                <input type="password" class="inputbox" placeholder="enter password" name="password" required><br>
                <input type="submit" value="login" name="plogin" class="login"><br>
                <p class="abc"> For New Registration  <a href="patientreg.php"> click here</a> </p>
                
            </form>
        </div>

        </div>

   
</body>
</html>