<?php
include 'connect.php';

$psp = $_POST['spec'];
$pdci = $_POST['doctor'];
$pna = $_POST['fu'];
$pmb = $_POST['mo'];
$pdt = $_POST['da'];
$ptm = $_POST['bg'];
$q="select * from doctor where dname='$pdci'";
$rsl=$con->query($q);
while($rs=$rsl->fetch_assoc())
{
                       
    $pdc=$rs['did'];
} 
$p="select * from patient where pname='$pna'";
$rl=$con->query($p);
while($s=$rl->fetch_assoc())
{                 
    $pi=$s['pid'];
} 
$uqry="select * from appointment where date='$pdt' and time='$ptm' and did='$pdc'";
                    $rlt=$con->query($uqry);
                    if($rlt->num_rows!=0)
                    {
                        echo"<script>alert('Slot not available');</script>";
                        echo'<script>window.location.href="pbook.php";</script>';
                        exit;
                    }
                    
                    $ury="select * from appointment where date='$pdt' and pid='$pi' and did='$pdc'";
                    $rl=$con->query($ury);
                    if($rl->num_rows!=0)
                    {
                        echo"<script>alert('Only One Appointment for the day');</script>";
                        echo'<script>window.location.href="pbook.php";</script>';
                    }
                   else
                   {
                    $qry ="insert into appointment(pid,did,date,time,status)values('".$pi."','".$pdc."','".$pdt."','".$ptm."','Pending')";
                    $rslt=$con->query($qry);
                    if($rslt) 
                    {   
                        
                        echo"<script>alert('Booked succesfully');</script>";
                        echo'<script>window.location.href="pdash.html";</script>';
                    } 
                    }
mysqli_close($con);
?>
