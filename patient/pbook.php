<?php
include 'pdash.html';
include 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width, initial-scale=1.0">
    <link rel="stylesheet" href="pbook.css">
    <title>Document</title>
</head>
<body>
<?php
$r=$_SESSION['us'];
$uqry="select * from patient where puser='$r'";
                    $rlt=$con->query($uqry);
                    while($rs=$rlt->fetch_assoc())
                    {
                        $n = $rs['pname'];
                        $m = $rs['pmob'];
                    }
    
?>
<div class="container">
       
       <header>Appointment Booking</header>
       <header>Doctor Timings 9.30am - 6.00pm</header>
	   <form method="post" action="pbook1.php">
        <div class="form">
        <div class="column">
               <div class="inputbox">
                   <label>Full Name :<pre></pre></label>
                   <input type="text" placeholder="enter patient's full name" value=<?php echo $n;?> name="fu" readonly required>
               </div>
               <div class="inputbox">
                   <label>Mobile Number :<pre></pre></label>
                   <input type="number" name="mo" placeholder="enter contact number" value=<?php echo $m;?> min="1000000000" max="9999999999" readonly required>
               </div>
            </div>

<div class="column">
	<div class="inputbox">
	<label for="specialization">Specialization:</label>
        <select id="spec" class="drp" name="spec" required onchange="getDoctors(this.value)">
            <option value="">Select Specialization</option>
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'hospital');
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                
                $sql = "SELECT DISTINCT spec FROM doctor";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['spec'] . '">' . $row['spec'] . '</option>';
                    }
                }

                mysqli_close($conn);
            ?>
        </select>

	</div>
	<div class="inputbox">		
    <label for="doctor">Doctor:</label>
        <select id="doctor" class="drp" name="doctor" required>
            <option value="">Select Doctor</option>
        </select>
	</div>
        </div>
               <div class="column">
                    <div class="inputbox">
                        <label>Date:<pre></pre></label>
                        <input type="date" id="date" name="da" placeholder="Date of Appointment" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+7 day')); ?>" required>
                    </div>
                    <div class="inputbox">
                            <label>Timings</label>
                        <select name="bg" class="drp" required>
                            <option value="9:30-10:00am" style="font-size: large;">9:30-10:00am</option>
                            <option value="10:00-10:30am" style="font-size: large;">10:00-10:30am</option>  
                            <option value="10:30-11:00am" style="font-size: large;">10:30-11:00am</option>
                            <option value="11:00-11:30am" style="font-size: large;">11:00-11:30am</option>
                            <option value="11:30-12:00pm" style="font-size: large;">11:30-12:00pm</option>
                            <option value="12:00-12:30pm" style="font-size: large;">12:00-12:30pm</option>
                            <option value="12:30-1:00pm" style="font-size: large;">12:30-1:00pm</option>  
                           

                            <option value="3:00-3:30pm" style="font-size: large;">3:00-3:30pm</option>
                            <option value="3:30-4:00pm" style="font-size: large;">3:30-4:00pm</option>
                            <option value="4:00-4:30pm" style="font-size: large;">4:00-4:30pm</option>  
                            <option value="4:30-5:00pm" style="font-size: large;">4:30-5:00pm</option>
                            <option value="5:00-5:30pm" style="font-size: large;">5:00-5:30pm</option>
                            <option value="5:30-6:00pm" style="font-size: large;">5:30-6:00pm</option> 

                        </select>
                    
                    </div>
                    </div>
                    <input type="submit" value="submit" class="b1">
        </div>
    </form>
</div>
<script>
        function getDoctors(spec) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'getdoc.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('doctor').innerHTML = xhr.responseText;
                }
            };
            xhr.send('spec=' + spec);
        }
    </script>
</body>
</html>