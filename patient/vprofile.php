<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vprof.css">
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
                        $i = $rs['pid'];
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
        <div class="scrolling">
        <header><b>Profile Details</b></header>
            <form action="" method="POST" class="form">
            <div class="column">
            <div class="inputbox">
                    <label>Patient Id :<pre></pre></label>
                    <input type="text"  readonly value=<?php echo $i;?>>
                </div>
                <div class="inputbox">
                    <label>Full Name :<pre></pre></label>
                    <input type="text"  readonly value=<?php echo $n;?>>
                </div>
                
                </div>
                <div class="column">
                <div class="inputbox">
                    <label>Mobile Number :<pre></pre></label>
                    <input type="number"  readonly value=<?php echo $m;?>>
                </div>
                    <div class="inputbox">
                        <label>Aadhar No :<pre></pre></label>
                        <input type="text"  readonly value=<?php echo $a;?>>
                    </div>
                </div>
                <div class="column">
                <div class="inputbox">
                    <label>Address :<pre></pre></label>
                    <input type="text" readonly  value=<?php echo $ad;?>>
                </div>
                    <div class="inputbox">
                        <label>Blood group :<pre></pre></label>
                        <input type="text"  readonly  value=<?php echo $b;?> >
                    </div>
                </div>
                    
                <div class="column">
                    <div class="inputbox">
                        <label>Father Name :<pre></pre></label>
                        <input type="text"  readonly value=<?php echo $f;?>>
                    </div>
                    <div class="inputbox">
                        <label>Date Of Birth :<pre></pre></label>
                        <input type="text" readonly  value=<?php echo $d;?>>
                    </div>
                </div>
                
                <div class="column">

                <div class="inputbox">
                    <label>User Name :<pre></pre></label>
                    <input type="text"  readonly value=<?php echo $r;?>>
                </div>
                    <div class="inputbox">
                        <label> password :<pre></pre></label>
                        <input type="text" readonly value=<?php echo $p;?>>
                    </div>
                </div>
            </form>
         </div>
         </div>

         </body>
</html>