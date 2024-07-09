<?php
            if(isset($_GET['del']))
            {
	            $did = $_GET['del'];

	            $con=mysqli_connect("localhost","root","","hospital");
	            if(mysqli_connect_errno())
	            {
	            	echo"could not connect";
	            	exit;
	            }
				$qr="select status from doctor where status='Deactive' and did='$did'";
	            $rsl=$con->query($qr);
	            if($rsl->num_rows!=0)
				{
					echo"<script>alert('Doctor already left the hospital');</script>";
					echo'<script>window.location.href="adoctor.php";</script>';
				}
				else
				{
	            $qry="update doctor set status='Deactive' where did='$did'";
	            $rslt=$con->query($qry);
	            if($rslt)
	            {
                    echo"<script>alert('Deleted succesfully');</script>";
                    echo'<script>window.location.href="adoctor.php";</script>';
	            }
	            else
	            {
	            	die(mysqli_error(($con)));
	            }
				}
            }
            ?>