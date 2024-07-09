<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</Form>
    </title>
    <link rel="stylesheet" href="preg.css">
</head>

<body>
<header>Patient Registration Form</header>

    <section class="container">
        <div class="scrolling">
           
        <?php
        include 'connect.php';

        $qry = "SELECT MAX(pid) AS max_id FROM patient";
        $result = $con->query($qry);
        $row = $result->fetch_assoc();
        $maxID = $row['max_id'];
        if ($maxID) {
            $currentNumber = intval(substr($maxID, 3));
            $newNumber = $currentNumber + 1;
        } else {
            $newNumber = 1;
        }
        $piid = 'PAT' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

            if (isset($_POST['pregister']))
            {
                
                $pname = $_POST['na'];
                $pmob = $_POST['mb'];
                $pblood = $_POST['bg'];
                $padhar = $_POST['an'];
                $padd = $_POST['ad'];
                $pfather = $_POST['fn'];
                $pdob = $_POST['db'];
                $pgn = $_POST['gn'];
                $puser = $_POST['un'];
                $ppass = $_POST['ps'];
                $pcpass = $_POST['cps'];
                
                $qry="select * from patient where pid='$piid'";
                $rl=$con->query($qry);
                if($rl->num_rows>0)
                {
                    echo "<b><center><h3>Patient Id already exist</h3></center></b>";
                }
                elseif ($ppass!=$pcpass)
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
                    
                    $uqry="select * from patient where puser='$puser'";
                    $rlt=$con->query($uqry);
                    if($rlt->num_rows!=0)
                    {
                        echo "<b><center><h3>username already exists</h3></center></b>";
                    }
                    else
                    {
                        $ac='Active';
                    $qry ="insert into patient(pid,pname,pmob,blood,adhar,padd,father,pdob,pgen,status,puser,ppass)values('".$piid."','".$pname."','".$pmob."','".$pblood."','".$padhar."','".$padd."','".$pfather."','".$pdob."','".$pgn."','".$ac."','".$puser."','".$ppass."')";
                    $rslt=$con->query($qry);
                    if($rslt) 
                    {
                        
                        echo"<script>alert('registered succesfully');</script>";
                        echo'<script>window.location.href="patientlog.php";</script>';
                    } 
                    }
                 }
                 
            }
            ?>

            <form action="" method="POST" class="form">
                <p> Already have an account? <a href="patientlog.php"> click here</a> </p>
                <div class="column">
                <div class="inputbox">
                    <label>Full Name</label>
                    <input type="text" placeholder="Enter full name" name="na" autocomplete="off" required pattern="[A-Za-z]+" title="name only contain alphabets">
                </div>
                </div>
                
                <div class="inputbox">
                    <label>Mobile Number</label>
                    <input type="tel" pattern="[0-9]{10}" maxlength="10" title="Please enter a 10-digit mobile number" placeholder="Enter mobile number" name="mb" required>
                </div>
                <div class="column">
                    <div class="inputbox">
                        <label>Blood group</label>
                    <select name="bg" class="drp">
                        <option value="A+" style="font-size: large;">A+</option>
                        <option value="A-" style="font-size: large;">A-</option>  
                        <option value="B+" style="font-size: large;">B+</option>
                        <option value="B-" style="font-size: large;">B-</option>
                        <option value="O+" style="font-size: large;">O+</option>
                        <option value="O-" style="font-size: large;">O-</option>  
                        <option value="AB+" style="font-size: large;">AB+</option>
                        <option value="AB-" style="font-size: large;">AB-</option>                    
                    </select>
                    </div>
                    <div class="inputbox">
                        <label>Aadhar No</label>
                        <input type="tel" id="aadhaar" name="an" pattern="[0-9]{12}"  placeholder="Enter your Aadhar card number" required title="it must contain 12 numbers" />
                    </div>
                </div>
                <div class="inputbox">
                    <label>Address</label><br>
                    <input type="text" name="ad" placeholder="Enter your full adderess" autocomplete="off" required />
                </div>

                <div class="column">
                <div class="inputbox">
                        <label>Date Of Birth</label>
                        <input type="date" name="db" id="myDate" max="<?php echo date('Y-m-d'); ?>" placeholder="Enter Birth Date" required />
                    </div>
                    <div class="inputbox">
                        <label>Father Name</label>
                        <input type="text" name="fn" pattern="[A-Za-z]+" placeholder="Enter your father name" autocomplete="off" />
                    </div>
                </div>
                <div class="genderbox">
                    <h3>Gender</h3>
                    <div class="genderoption">
                        <div class="gender">
                            <input type="radio" id="check-male" name="gn" value="Male" required checked />
                            <label for="check-male">Male</label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="check-female" name="gn" value="Female" required />
                            <label for="check-female">Female</label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="check-other" name="gn" value="Others" required />
                            <label for="check-other">Others</label>
                        </div>
                    </div>
                </div>
                <div class="inputbox">
                    <label>User Name</label>
                    <input type="text" id="username" name="un" pattern="[a-zA-Z0-9]+" minlength="5" placeholder="Enter your username here" required>
                </div>

                <div class="column">
                    <div class="inputbox">
                        <label>Create password</label>
                        <input type="password" name="ps"  pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must contain at least one letter and one number." placeholder="enter your password here" required>
                    </div>
                    <div class="inputbox">
                        <label>Confirm password</label>
                        <input type="password" name="cps" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" placeholder="confirm password" required />
                    </div>
                </div>
                <button type="submit" name="pregister">Register</button>
            </form>
        </div>
    </section>
    <script>
    var currentDate = new Date();

    var minDate = new Date();
    minDate.setFullYear(currentDate.getFullYear() - 100);

    var minDateString = minDate.toISOString().split('T')[0];

    window.onload = function() {
      document.getElementById("myDate").setAttribute("min", minDateString);
    };
  </script>
</body>

</html>