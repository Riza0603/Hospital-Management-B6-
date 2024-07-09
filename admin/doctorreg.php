<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</Form></title>

    <link rel="stylesheet" href="doctorreg.css">
</head>
<body>
<header>Doctor Registration Form</header>
    <section class="container">
        <div class="scrolling">
        <?php

include 'connect.php';

$qry = "SELECT MAX(did) AS max_id FROM doctor";
$result = $con->query($qry);
$row = $result->fetch_assoc();
$maxID = $row['max_id'];
if ($maxID) {
    $currentNumber = intval(substr($maxID, 3));
    $newNumber = $currentNumber + 1;
} else {
    $newNumber = 1;
}
$diid = 'DOC' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);


            if (isset($_POST['dregister']))
            {                
                $diid = $_POST['iid'];
                $dname = $_POST['na'];
                $dmob = $_POST['mb'];
                $dsp = $_POST['sp'];
                $ded = $_POST['ed'];
                $dadd = $_POST['ad'];
                $ddob = $_POST['db'];
                $dgn = $_POST['gn'];
                $duser = $_POST['un'];
                $dpass = $_POST['ps'];
                $dcpass = $_POST['cps'];
                $dsa=$_POST['sa'];

                $qry="select * from doctor where did='$diid'";
                $rl=$con->query($qry);
                if($rl->num_rows>0)
                {
                    echo "<b><center><h3>Doctor Id already exist</h3></center></b>";
                }
                elseif ($dpass!=$dcpass)
                 {
                    echo "<b><center><h3>password mismatch</h3></center></b>";
                 } 
                 else 
                 {
                    $con = mysqli_connect("localhost","root","","hospital");
                    if (mysqli_connect_errno()) 
                    {
                        echo "could not connect";
                        exit;
                    }
                    
                    $uqry="select * from doctor where duser='$duser'";
                    $rlt=$con->query($uqry);
                    if($rlt->num_rows!=0)
                    {
                        echo "<b><center><h3>username already exists</h3></center></b>";
                    }
                    else
                    {
                    $qry ="insert into doctor(did,dname,dmob,spec,degree,dadd,ddob,dgen,duser,dpass,status)values('".$diid."','".$dname."','".$dmob."','".$dsp."','".$ded."','".$dadd."','".$ddob."','".$dgn."','".$duser."','".$dpass."','".$dsa."')";
                    $rslt=$con->query($qry);
                    if($rslt) 
                    {
                        
                        echo"<script>alert('registered succesfully');</script>";
                        echo'<script>window.location.href="doctor.php";</script>';
                    } 
                    }
                 }
                 
            }
            ?>

        
        <form action="" method="POST" class="form">
         <a href="doctor.php">Back</a>
         <div class="column">
         <div class="inputbox">
                <label>Doctor ID</label><br>
                <input type="text" placeholder="Enter docter id" name="iid" value=<?php echo $diid;?> autocomplete="off" required>
            </div>
            <div class="inputbox">
                <label>Doctor Name</label><br>
                <input type="text" placeholder="Enter docter name" name="na" autocomplete="off" required pattern="[A-Za-z]+" title="name only contain alphabets">
            </div>
         </div>
            <div class="inputbox">
                <label>Mobile Number</label><br>
                <input type="tel" pattern="[0-9]{10}" title="Please enter a 10-digit mobile number"  placeholder="Enter mobile number" required  name="mb">
            </div>

            <div class="column">
                <div class="inputbox">
                    <label>Specilization</label>
                    <select name="sp" class="drp">
                        <option value="Pediatrician" style="font-size: large;">Pediatrician</option>
                        <option value="Gynecologiste" style="font-size: large;">Gynecologist</option>
                        <option value="Cardiologist" style="font-size: large;">Cardiologist</option>
                        <option value="Oncologist" style="font-size: large;">Oncologist</option>  
                        <option value="Gastroenterologist" style="font-size: large;">Gastroenterologist</option>
                        <option value="Pulmonologist" style="font-size: large;">Pulmonologist</option>
                        <option value="Endocrinologist" style="font-size: large;">Endocrinologist</option>
                        <option value="Ophthalmologist" style="font-size: large;">Ophthalmologist</option>
                        <option value="Otolaryngologist" style="font-size: large;">Otolaryngologist</option>
                        <option value="Psychiatrist" style="font-size: large;">Psychiatrist</option>
                        <option value="Neurologist" style="font-size: large;">Neurologist</option>
                        <option value="Anesthesiologist" style="font-size: large;">Anesthesiologist</option>  
                        <option value="Surgeon" style="font-size: large;">Surgeon</option>
                        <option value="Orthopedic" style="font-size: large;">Orthopedic</option>
                        <option value="Dermatologist" style="font-size: large;">Dermatologist</option>
                    </select>
                </div>
                <div class="inputbox">
                    <label>Qualification</label>
                    <input type="text" style="padding-top: 15px;padding-bottom: 15px;margin-top: 5px;" pattern="[A-Za-z]+" placeholder="Enter qualification" title="qualification contain only a alphabets" autocomplete="off" required name="ed"/>
                </div>
            </div>
            <div class="inputbox">
                <label>Address</label><br>
                <input type="text" placeholder="Enter full adderess" required name="ad" autocomplete="off" >
            </div>

            <div class="column">
                <div class="inputbox">
                    <label>Date Of Birth</label><br>
                    <input type="date" id="myDate" placeholder="Enter Birth Date" required name="db">
                    </div>
                    <div class="inputbox">
                    <label>Status</label><br>
                    <select name="sa" class="drp">
                        <option value="Available" style="font-size: large;">Available</option>
                        <option value="Not Available" style="font-size: large;">Not Available</option>                       
                    </select>
                    </div>
                </div>
            <div class="genderbox">
                <h3>Gender</h3><br>
                <div class="genderoption">
                    <div class="gender">
                        <input type="radio" id="check-male" name="gn" value="Male" required checked/>
                        <label for="check-male">Male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="gn" value="Female" required/>
                        <label for="check-female">Female</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-other" name="gn" value="Other" required/>
                        <label for="check-other">Others</label>
                    </div>
                </div>
            </div>
    
            <div class="inputbox">
                <label>User Name</label>
                <input type="text" id="username" name="un" pattern="[a-zA-Z0-9]+" minlength="5" title="username must be minimum 5 character" required placeholder="enter your user name">
            </div>
           
            <div class="column">
                <div class="inputbox">
                    <label>Create password</label>
                    <input type="password" name="ps" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must contain 8 charectar with at least one letter and one number." placeholder="enter your password here">
                </div>
                <div class="inputbox">
                    <label>Confirm password</label>
                    <input type="password" placeholder="confirm password" name="cps" required/>
                </div>
            </div>
            <button type="submit" name="dregister">Sumbit</button>
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