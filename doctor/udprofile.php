<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="udprof.css">
    <title>Document</title>
</head>
<body>
    <?php
session_start();
include 'ddash.html';
$r=$_SESSION['ds'];
$con = mysqli_connect("localhost","root","","hospital");
                    if (mysqli_connect_errno()) 
                    {
                        echo "could not connect";
                        exit;
                    }
                    
$uqry="select * from doctor where duser='$r'";
                    $rlt=$con->query($uqry);
                    while($rs=$rlt->fetch_assoc())
                    {
                        $uidd = $rs['did'];
                        $n = $rs['dname'];
                        $m = $rs['dmob'];
                        $b = $rs['dadd'];
                        $d = $rs['ddob'];
                        $s = $rs['status'];
                        $p = $rs['dpass'];
                    }
    
?>
 <div class="container">
    <?php
if (isset($_POST['dupdate']))
{
    $dname = $_POST['na'];
    $dmob = $_POST['mb'];
    $dadd = $_POST['ad'];
    $ddob = $_POST['db'];
    $dst = $_POST['st'];
    $dpass = $_POST['ps'];
    $dcpass = $_POST['cps'];

    if($n==$dname and $m==$dmob and $b==$dadd and $d==$ddob and $s==$dst and $p==$dpass and $p==$dcpass)
                {
                    echo"<script>alert('No changes where made');</script>";
                    echo'<script>window.location.href="udprofile.php";</script>';
                }
                else
                {
    if($ppass==$pcpass)
    {
        $uqry="update doctor set dname='".$dname."',dmob='".$dmob."',dadd='".$dadd."',ddob='".$ddob."',status='".$dst."',dpass='".$dpass."' where duser='$r'";
        $rlt=$con->query($uqry);
        if($rlt)
        {
            echo"<script>alert('Updated succesfully');</script>";
            echo'<script>window.location.href="ddash.html";</script>';
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
                    <input type="text" name="na" value=<?php echo $n;?> pattern="[A-Za-z]+" title="name only contain alphabets" required>
                </div>
                <div class="inputbox">
                    <label>Mobile Number :<pre></pre></label>
                    <input type="tel" pattern="[0-9]{10}" title="Please enter a 10-digit mobile number" placeholder="Enter mobile number" name="mb" required value=<?php echo $m;?> required>
                </div>
                </div>
                <div class="column">
                <div class="inputbox">
                    <label>Address :<pre></pre></label>
                    <input type="text" name="ad" value=<?php echo $b;?>>
                </div>
                <div class="inputbox">
                        <label>date of birth :<pre></pre></label>
                        <input type="date" name="db" id="myDate" value=<?php echo $d;?>>
                    </div>
                </div>
                
                <div class="column">
                <div class="inputbox">
                    <label>Status :<pre></pre></label>
                    <select name="st" class="drp">
                        <option value="Available" <?php if ($s == 'Available') echo 'selected'; ?> style="font-size: large;">Available</option>
                        <option value="Not Available" <?php if ($s == 'Not Available') echo 'selected'; ?> style="font-size: large;">Not Available</option>                       
                    </select>
                </div>
                </div>
                
                <div class="column">
                    <div class="inputbox">
                        <label> password :<pre></pre></label>
                        <input type="text" name="ps" value=<?php echo $p;?>  pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must contain at least one letter and one number." placeholder="enter your password here" required>
                    </div>
                    <div class="inputbox">
                        <label>confirm password :<pre></pre></label>
                        <input type="text" name="cps" value=<?php echo $p;?> pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" placeholder="confirm password" required />
                    </div>
                </div>
                <button type="submit" name="dupdate" class="b1">Update</button>
            </form>
         </div>
         <script>
    var currentDate = new Date();

    var minDate = new Date();
    minDate.setFullYear(currentDate.getFullYear() - 100);

    var maxDate = new Date();
    maxDate.setFullYear(currentDate.getFullYear() - 20);

    var minDateString = minDate.toISOString().split('T')[0];
    var maxDateString = maxDate.toISOString().split('T')[0];

    window.onload = function() {
      document.getElementById("myDate").setAttribute("min", minDateString);
      document.getElementById("myDate").setAttribute("max", maxDateString);
    };
  </script>
         </body>
</html>