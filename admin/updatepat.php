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
    <link rel="stylesheet" href="updatepat.css">
</head>

<body>
    <section class="container">
        <div class="scrolling">
           
        <?php
        include 'connect.php';
        $uidd=$_GET['pupt'];
        $sql="select * from patient where pid='$uidd'";
        $rt=$con->query($sql);
        $r=mysqli_fetch_assoc($rt);
        $pn = $r['pname'];
        $pm = $r['pmob'];
        $pbd = $r['blood'];
        $paa = $r['adhar'];
        $pad = $r['padd'];
        $pft = $r['father'];
        $pd = $r['pdob'];
        $pg = $r['pgen'];
        $pp = $r['ppass'];
        $pst = $r['status'];


        if($pst=='Deactive')
        {
            echo"<script>alert('Patient deactivated cannot update');</script>";
            echo'<script>window.location.href="apatient.php";</script>';
        }
        else
        {
            if (isset($_POST['pupdate']))
            {
                $pname = $_POST['na'];
                $pmob = $_POST['mb'];
                $pblood = $_POST['bg'];
                $padhar = $_POST['an'];
                $padd = $_POST['ad'];
                $pfather = $_POST['fn'];
                $pdob = $_POST['db'];
                $pgn = $_POST['gen'];
                $ppass = $_POST['ps'];
                $pcpass = $_POST['cps'];
                
                if($pn==$pname and $pm==$pmob and $pbd==$pblood and $paa==$padhar and $pad==$padd and $pft==$pfather and $pd==$pdob and $pg==$pgn and $pp==$ppass and $pp==$pcpass)
                {
                    echo"<script>alert('No changes where made');</script>";
                    echo'<script>window.location.href="apatient.php";</script>';
                }
                else
                {
                if($ppass==$pcpass)
                {
                    $uqry="update patient set pname='".$pname."',pmob='".$pmob."',blood='".$pblood."',adhar='".$padhar."',padd='".$padd."',father='".$pfather."',pdob='".$pdob."',pgen='".$pgn."',ppass='".$ppass."' where pid='$uidd'";
                    $rlt=$con->query($uqry);
                    if($rlt)
                    {

                        echo"<script>alert('Updated succesfully');</script>";
                        echo'<script>window.location.href="apatient.php";</script>';
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

            <header>Patient Update Form</header>
            <form action="" method="POST" class="form">
                <p><a href="apatient.php"> Back</a> </p>
                <div class="column">
                <div class="inputbox">
                    <label>Full Name</label>
                    <input type="text" pattern="[A-Za-z]+" title="name only contain alphabets" placeholder="Enter full name" name="na" value=<?php echo $pn;?> autocomplete="off" required />
                </div>
                </div>
                
                <div class="inputbox">
                    <label>Mobile Number</label>
                    <input type="tel" maxlength="10" title="Please enter a 10-digit mobile number" placeholder="Enter mobile number" name="mb" value="<?php echo $pm;?>" required />
                </div>
                <div class="column">
                    <div class="inputbox">
                        <label>Blood group</label>
                    <select name="bg" class="drp">
                        <option value="A+" <?php if ($pbd == 'A+') echo 'selected'; ?> style="font-size: large;">A+</option>
                        <option value="A-" <?php if ($pbd == 'A-') echo 'selected'; ?> style="font-size: large;">A-</option>  
                        <option value="B+" <?php if ($pbd == 'B+') echo 'selected'; ?> style="font-size: large;">B+</option>
                        <option value="B-" <?php if ($pbd == 'B-') echo 'selected'; ?> style="font-size: large;">B-</option>
                        <option value="O+" <?php if ($pbd == 'O+') echo 'selected'; ?> style="font-size: large;">O+</option>
                        <option value="O-" <?php if ($pbd == 'O-') echo 'selected'; ?> style="font-size: large;">O-</option>  
                        <option value="AB+" <?php if ($pbd == 'AB+') echo 'selected'; ?> style="font-size: large;">AB+</option>
                        <option value="AB-" <?php if ($pbd == 'AB-') echo 'selected'; ?> style="font-size: large;">AB-</option>                    
                    </select>
                    </div>
                    <div class="inputbox">
                        <label>Aadhar No</label>
                        <input type="number" name="an" pattern="[0-9]{12}"  placeholder="Enter your Aadhar card number" required title="it must contain 12 numbers" value=<?php echo $paa;?> required/>
                    </div>
                </div>
                <div class="inputbox">
                    <label>Address</label><br>
                    <input type="text" name="ad" placeholder="Enter your full adderess" value=<?php echo $pad;?> autocomplete="off" required />
                </div>

                <div class="column">
                    <div class="inputbox">
                        <label>Father Name</label>
                        <input type="text" name="fn" pattern="[A-Za-z]+" placeholder="Enter your father name" value=<?php echo $pft;?> autocomplete="off" />
                    </div>
                    <div class="inputbox">
                        <label>Date Of Birth</label>
                        <input type="date" id="myDate" max="<?php echo date('Y-m-d'); ?>" name="db" placeholder="Enter Birth Date" value=<?php echo $pd;?> required />
                    </div>
                </div>
                <div class="genderbox">
                    <h3>Gender</h3>
                    <div class="genderoption">
                        <div class="gender">
                            <input type="radio" id="check-male" name="gen" value="Male" <?php if ($pg == 'Male') echo 'checked'; ?> required />Male
                        </div>
                        <div class="gender">
                            <input type="radio" id="check-female" name="gen" value="Female" <?php if ($pg == 'Female') echo 'checked'; ?> required />Female
                        </div>
                        <div class="gender">
                            <input type="radio" id="check-other" name="gen" value="Others" <?php if ($pg == 'Others') echo 'checked'; ?> required />Others
                        </div>
                    </div>
                </div>
               
                <div class="column">
                    <div class="inputbox">
                        <label>Create password</label>
                        <input type="text" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must contain at least one letter and one number." name="ps" value=<?php echo $pp;?> placeholder="Enter password" />
                    </div>
                    <div class="inputbox">
                        <label>Confirm password</label>
                        <input type="text" name="cps" value=<?php echo $pp;?> placeholder="confirm password" required />
                    </div>
                </div>
                <button type="submit" name="pupdate">Update</button>
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