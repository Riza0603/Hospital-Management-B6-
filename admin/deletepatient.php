<?php
            if(isset($_GET['pdel']))
            {
	            $pid = $_GET['pdel'];

	            $con=mysqli_connect("localhost","root","","hospital");
	            if(mysqli_connect_errno())
	            {
	            	echo"could not connect";
	            	exit;
	            }
				$qr="select * from patient where status='Deactive' and pid='$pid'";
	            $rsl=$con->query($qr);
	            if($rsl->num_rows!=0)
				{
					echo"<script>alert('Patient already Deactivated');</script>";
					echo'<script>window.location.href="apatient.php";</script>';
				}
				else
				{
	            $qry="update patient set status='Deactive' where pid='$pid'";
	            $rslt=$con->query($qry);
	            if($rslt)
	            {
                    echo"<script>alert('Deleted succesfully');</script>";
                    echo'<script>window.location.href="apatient.php";</script>';
	            }
	            else
	            {
	            	die(mysqli_error(($con)));
	            }
				}
            }
            ?>