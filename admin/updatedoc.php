<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="doctorreg.css">

</head>
<body>
<header>Doctor Registration Form</header>
    <section class="container">
        <div class="scrolling">

        <?php

        include 'connect.php';
        $uidd=$_GET['upt'];
        
        $sql="select * from doctor where did='$uidd'";
        $rt=$con->query($sql);
        $r=mysqli_fetch_assoc($rt);
        $dn = $r['dname'];
        $dm = $r['dmob'];
        $dsl = $r['spec'];
        $de = $r['degree'];
        $da = $r['dadd'];
        $dd = $r['ddob'];
        $dg = $r['dgen'];
        $dp = $r['dpass'];
        $dst= $r['status'];
        
        if($dst=='Deactive')
        {
            echo"<script>alert('Doctor deactivated cannot update');</script>";
            echo'<script>window.location.href="adoctor.php";</script>';
        }
        else
        {

            if (isset($_POST['dregister']))
            {
                $dname = $_POST['na'];
                $dmob = $_POST['mb'];
                $dsp = $_POST['sp'];
                $ded = $_POST['ed'];
                $dadd = $_POST['ad'];
                $ddob = $_POST['db'];
                $dpass = $_POST['ps'];
                $dcpass = $_POST['cps'];
                $dsa=$_POST['sa'];
                
                if($dn==$dname and $dm==$dmob and $dsl==$dsp and $de==$ded and $da==$dadd and $dd==$ddob and $dst==$dsa and $dp==$dpass and $dp==$dcpass)
                {
                    echo"<script>alert('No changes where made');</script>";
                    echo'<script>window.location.href="adoctor.php";</script>';
                }
                else
                {

                if($dpass==$dcpass)
                {   
                    
                    $uqry="update doctor set dname='".$dname."',dmob='".$dmob."',spec='".$dsp."',degree='".$ded."',dadd='".$dadd."',ddob='".$ddob."',dpass='".$dpass."',status='".$dsa."' where did='$uidd'";
                    $rlt=$con->query($uqry);
                    if($rlt)
                    {

                        echo"<script>alert('Updated succesfully');</script>";
                        echo'<script>window.location.href="adoctor.php";</script>';
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
        }

        ?>

        <form action="" method="POST" class="form">
         <a href="adoctor.php">Back</a>
            <div class="inputbox">
                <label>Doctor Name</label>
                <input type="text" placeholder="Enter docter name" name="na" value=<?php echo $dn;?> autocomplete="off" required pattern="[A-Za-z]+" title="name only contain alphabets" />
            </div>
            <div class="inputbox">
                <label>Mobile Number</label>
                <input type="tel" pattern="[0-9]{10}" title="Please enter a 10-digit mobile number" placeholder="Enter mobile number" required min="1000000000" max="9999999999" value=<?php echo $dm;?> name="mb"/>
            </div>
            <div class="column">
                <div class="inputbox">
                    <label>Specilization</label>
                    <select name="sp" class="drp">
                        <option value="Pediatrician" <?php if ($dsl == 'Pediatrician') echo 'selected'; ?> style="font-size: large;">Pediatrician</option>
                        <option value="Gynecologiste" <?php if ($dsl == 'Gynecologiste') echo 'selected'; ?> style="font-size: large;">Gynecologist</option>
                        <option value="Cardiologist" <?php if ($dsl == 'Cardiologist') echo 'selected'; ?> style="font-size: large;">Cardiologist</option>
                        <option value="Oncologist" <?php if ($dsl == 'Oncologist') echo 'selected'; ?> style="font-size: large;">Oncologist</option>  
                        <option value="Gastroenterologist" <?php if ($dsl == 'Gastroenterologist') echo 'selected'; ?> style="font-size: large;">Gastroenterologist</option>
                        <option value="Pulmonologist" <?php if ($dsl == 'Pulmonologist') echo 'selected'; ?> style="font-size: large;">Pulmonologist</option>
                        <option value="Endocrinologist" <?php if ($dsl == 'Endocrinologist') echo 'selected'; ?> style="font-size: large;">Endocrinologist</option>
                        <option value="Ophthalmologist" <?php if ($dsl == 'Ophthalmologist') echo 'selected'; ?> style="font-size: large;">Ophthalmologist</option>
                        <option value="Otolaryngologist" <?php if ($dsl == 'Otolaryngologist') echo 'selected'; ?> style="font-size: large;">Otolaryngologist</option>
                        <option value="Psychiatrist" <?php if ($dsl == 'Psychiatrist') echo 'selected'; ?> style="font-size: large;">Psychiatrist</option>
                        <option value="Neurologist" <?php if ($dsl == 'Neurologist') echo 'selected'; ?> style="font-size: large;">Neurologist</option>
                        <option value="Anesthesiologist" <?php if ($dsl == 'Anesthesiologist') echo 'selected'; ?> style="font-size: large;">Anesthesiologist</option>  
                        <option value="Surgeon" <?php if ($dsl == 'Surgeon') echo 'selected'; ?> style="font-size: large;">Surgeon</option>
                        <option value="Orthopedic" <?php if ($dsl == 'Orthopedic') echo 'selected'; ?> style="font-size: large;">Orthopedic</option>
                        <option value="Dermatologist" <?php if ($dsl == 'Dermatologist') echo 'selected'; ?> style="font-size: large;">Dermatologist</option>
                    </select>              
                  </div>
                <div class="inputbox">
                    <label>QUalification</label>
                    <input type="text" pattern="[A-Za-z]+" placeholder="Enter qualification" title="qualification contain only a alphabets" placeholder="Enter degree" value=<?php echo $de;?> autocomplete="off" required name="ed"/>
                </div>
            </div>
            <div class="inputbox">
                <label>Address</label><br>
                <input type="text" placeholder="Enter full adderess" value=<?php echo $da;?> required name="ad" autocomplete="off"/>
            </div>

            <div class="column">          
                <div class="inputbox">
                    <label>Date Of Birth</label>
                    <input type="date" id="myDate" placeholder="Enter Birth Date" value=<?php echo $dd;?> required name="db"/>
                </div>
                <div class="inputbox">
                    <label>Status</label><br>
                    <select name="sa" class="drp">
                        <option value="Available" <?php if ($dst == 'Available') echo 'selected'; ?> style="font-size: large;">Available</option>
                        <option value="Not Available" <?php if ($dst == 'Not Available') echo 'selected'; ?> style="font-size: large;">Not Available</option>                       
                    </select>
                    </div>
                </div>
           
            <div class="column">
                <div class="inputbox">
                    <label>Create password</label>
                    <input type="text" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must contain 8 charectar with at least one letter and one number." placeholder="Enter password" value=<?php echo $dp;?> name="ps" required/>
                </div>
                <div class="inputbox">
                    <label>Confirm password</label>
                    <input type="text" placeholder="confirm password" value=<?php echo $dp;?> name="cps" required/>
                </div>
            </div>
            <button type="submit" name="dregister">Update</button>
        </form>
        </div>
    </section>
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