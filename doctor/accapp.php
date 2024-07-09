<?php
session_start();
            if(isset($_GET['acc']))
            {
	            $did = $_GET['acc'];
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
                    echo"<script>alert('Already consulted');</script>";
                    echo'<script>window.location.href="vapp.php";</script>';
	            }
				else
				{
				$y="select status from appointment where pid='$did' and status='Rejected' and date='$dda' and time='$dti'";
				$rl=$con->query($y);
	            if($rl->num_rows!=0)
	            {
                    echo"<script>alert('Appointment already Rejected');</script>";
                    echo'<script>window.location.href="vapp.php";</script>';
	            }
				else
				{
				$ry="select status from appointment where pid='$did' and status='Confirmed' and date='$dda' and time='$dti'";
				$rs=$con->query($ry);
	            if($rs->num_rows!=0)
	            {
                    echo"<script>alert('Already Accepted');</script>";
                    echo'<script>window.location.href="vapp.php";</script>';
	            }
				else
				{
	            $qry="update appointment set status='Confirmed' where pid='$did' and date='$dda' and time='$dti'";
	            $rsl=$con->query($qry);
	            if($rsl)
	            {
                    echo"<script>alert('Accepted succesfully');</script>";
                    echo'<script>window.location.href="vapp.php";</script>';
	            }
	            else
	            {
	            	die(mysqli_error(($con)));
	            }
				}
				}
			}
            }
            ?>