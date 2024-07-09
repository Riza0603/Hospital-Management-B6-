<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vdprof.css">
    <title>Document</title>
</head>
<body>
    <?php
session_start();
include 'ddash.html';
include 'connect.php';
$r=$_SESSION['ds'];
                    
$uqry="select * from doctor where duser='$r'";
                    $rlt=$con->query($uqry);
                    while($rs=$rlt->fetch_assoc())
                    {
                        $i = $rs['did'];
                        $n = $rs['dname'];
                        $m = $rs['dmob'];
                        $a = $rs['spec'];
                        $b = $rs['degree'];
                        $f = $rs['dadd'];
                        $d = $rs['ddob'];
                        $g = $rs['dgen'];
                        $p = $rs['dpass'];
                        $s = $rs['status'];
                    }
?>
 <div class="container">
        <div class="scrolling">
        <header><b>Profile Details</b></header>
            <form action="" method="POST" class="form">
            <div class="column">
            <div class="inputbox">
                    <label>Doctor Id :<pre></pre></label>
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
                        <label>Specialization :<pre></pre></label>
                        <input type="text"  readonly value=<?php echo $a;?>>
                    </div>
                </div>
                <div class="column">
                <div class="inputbox">
                    <label>Qualification :<pre></pre></label>
                    <input type="text" readonly  value=<?php echo $b;?>>
                </div>
                    <div class="inputbox">
                        <label>Status :<pre></pre></label>
                        <input type="text"  readonly  value=<?php echo $s;?> >
                    </div>
                </div>
                    
                <div class="column">
                    <div class="inputbox">
                        <label>Address :<pre></pre></label>
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