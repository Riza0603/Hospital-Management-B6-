<?php
session_start();
            if(isset($_GET['con']))
            {
	            $did = $_GET['con'];
				$dda = $_GET['dd'];
				$dti = $_GET['tt'];
	            $con=mysqli_connect("localhost","root","","hospital");
	            if(mysqli_connect_errno())
	            {
	            	echo"could not connect";
	            	exit;
	            }
				$ry="select status from appointment where pid='$did' and status='Consulted' and date='$dda' and time='$dti'";
				$rslt=$con->query($ry);
	            if($rslt->num_rows!=0)
	            {
                    echo"<script>alert('Already Consulted');</script>";
                    echo'<script>window.location.href="consul.php";</script>';
	            }
				else
				{
	            $qry="update appointment set status='Consulted' where pid='$did' and date='$dda' and time='$dti'";
	            $rsl=$con->query($qry);
	            if($rsl)
	            {
                    echo"<script>alert('Consulted succesfully');</script>";
                    echo'<script>window.location.href="consul.php";</script>';
	            }
	            else
	            {
	            	die(mysqli_error(($con)));
	            }
				}
            }
            ?>