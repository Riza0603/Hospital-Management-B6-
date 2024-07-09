<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="uprof.css">
    <title>Document</title>
</head>
<body>
    <?php
session_start();
include 'pdash.html';
$r=$_SESSION['us'];
$con = mysqli_connect("localhost","root","","hospital");
                    if (mysqli_connect_errno()) 
                    {
                        echo "could not connect";
                        exit;
                    }
                    
$uqry="select * from patient where puser='$r'";
                    $rlt=$con->query($uqry);
                    while($rs=$rlt->fetch_assoc())
                    {
                        $uidd = $rs['pid'];
                        $n = $rs['pname'];
                        $m = $rs['pmob'];
                        $b = $rs['blood'];
                        $a = $rs['adhar'];
                        $f = $rs['father'];
                        $ad = $rs['padd'];
                        $d = $rs['pdob'];
                        $g = $rs['pgen'];
                        $p = $rs['ppass'];
                    }
    
?>
 <div class="container">
    <?php
if (isset($_POST['pupdate']))
{
    $pname = $_POST['na'];
    $pmob = $_POST['mb'];
    $padd = $_POST['ad'];
    $pfather = $_POST['fn'];
    $ppass = $_POST['ps'];
    $pcpass = $_POST['cps'];

    if($n==$pname and $m==$pmob and $ad==$padd and $f==$pfather and $p==$ppass and $p==$pcpass)
                {
                    echo"<script>alert('No changes where made');</script>";
                    echo'<script>window.location.href="uprofile.php";</script>';
                }
                else
                {
    if($ppass==$pcpass)
    {
        $uqry="update patient set pname='".$pname."',pmob='".$pmob."',padd='".$padd."',father='".$pfather."',ppass='".$ppass."' where puser='$r'";
        $rlt=$con->query($uqry);
        if($rlt)
        {   
            echo"<script>alert('Updated successfully');</script>";
            echo'<script>window.location.href="vprofile.php";</script>';
        }
        else
        {
            die(mysqli_error(($con)));
        }
    }
    else
    {
        echo "<b><center><h3>password mismatch</h3></center></b>";
    } 
    }
}
    ?>
        <header><b>Update profile</b></header>
            <form action="" method="POST" class="form">
            <div class="column">
                <div class="inputbox">
                    <label>Full Name :<pre></pre></label>
                    <input type="text" name="na" value=<?php echo $n;?>  pattern="[A-Za-z]+" title="name only contain alphabets">
                </div>
                <div class="inputbox">
                    <label>Mobile Number :<pre></pre></label>
                    <input type="tel" pattern="[0-9]{10}" title="Please enter a 10-digit mobile number" placeholder="Enter mobile number" name="mb" value=<?php echo $m;?>>
                </div>
                </div>
                <div class="column">
                <div class="inputbox">
                    <label>Address :<pre></pre></label>
                    <input type="text" name="ad" value=<?php echo $ad;?>>
                </div>
                <div class="inputbox">
                        <label>Father Name :<pre></pre></label>
                        <input type="text" name="fn"  value=<?php echo $f;?> pattern="[A-Za-z]+" title="name only contain alphabets">
                    </div>
                </div>
                    
                
                <div class="column">
                    <div class="inputbox">
                        <label> password :<pre></pre></label>
                        <input type="text" name="ps" value=<?php echo $p;?> pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must contain at least one letter and one number." placeholder="enter your password here" >
                    </div>
                    <div class="inputbox">
                        <label>confirm password :<pre></pre></label>
                        <input type="text" name="cps"  value=<?php echo $p;?>  required >
                    </div>
                </div>
                <button type="submit" name="pupdate" class="b1">Update</button>
            </form>
         </div>

         </body>
</html>