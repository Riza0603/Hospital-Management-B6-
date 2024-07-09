<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<div class="container"> 
</head>
<?php
include 'connect.php';
$pus=$_GET['pu'];
$sql="select * from queries where qid='$pus'";
$rt=$con->query($sql);
$r=mysqli_fetch_assoc($rt);
$subject=$r['sub'];
$reply1=$r['reply'];
$pp=$r['pid'];

$qry="select * from patient where pid='$pp'";
$result=$con->query($qry);
while($d=$result->fetch_assoc())
{
    $pn = $d['pname'];
    $pm = $d['pmob'];
}
?>
<body>
	<form action="" method="POST" class="form">
        <h4>RESPONCE FORM</h4>
      <h3><a href="queries.php">Back</a></h3>
      <div class="column">
                    <div class="inputbox">
                        <label>Full Name :<pre></pre></label>
                        <input type="text" name="na"  value=<?php echo $pn;?> readonly >
                    </div>
                    <div class="inputbox">
                        <label>Mobile Number :<pre></pre></label>
                        <input type="number" name="ca"  value=<?php echo $pm;?> readonly >
                    </div>
</div>
                            
<div class="inputbox">
    <div class="textareas">	
<label>Query </label><br><br>	 
<textarea name="sub" rows="4" cols="50" readonly>
<?php echo $subject;?>
</textarea>
</div>
                 
        
<div class="inputbox">	
<label>Responce For The Query </label><br><br>	 
<textarea name="rep" rows="4"  required >
<?php echo $reply1;?>
</textarea>
</div>
</div>
         <button type="submit" value="submit" name="submit">upload</button>
    </div>  

</form>

<?php
 if (isset($_POST['submit']))
            {
                $dsp = $_POST['sub'];
                $ded = $_POST['rep'];

                $uqry="update queries set reply='".$ded."' where qid='$pus'";
                $rlt=$con->query($uqry);
                if($rlt)
                {
                    echo"<script>alert('Updated succesfully');</script>";
                    echo'<script>window.location.href="queries.php";</script>';
                }
                else
                {
                    die(mysqli_error(($con)));
                }
                
            }
            
            ?>
</body>
</html>
<style>
    
.container{
    position: relative;
    max-width: 600px;
    width: 100%;
    background-color: rgb(251, 249, 249);
    padding: 15px;
  box-shadow: 0 0 15px rgba(0,0,0,0.1);
  left: 550px;
  top: 20px;
  border-radius: 15px;
}
body{
    background-color:rgb(248, 247, 249);
}
h4{
    transform: translate(170px);
    color: blue;
    font-size: 30px;
}

.inputbox{
    width: 80%;
    margin-top: 20px;
    display: block;
    border-color: black;
}

.inputbox label{
    color: blue;
    font-size: 20px;
}
textarea{
    width: 100%;
}
.inputbox input{
    position: relative;
    height: 50px;
    width: 200px;
    border-color: black;
    font-size: 1rem;
    color: black;
    margin-top: 8px;
    border: 1px solid white;
    border-radius: 10px;
    padding: 0 15px;
}
.inputbox textarea{
    border-radius: 10px;
   
    height: 70px;
    width: 560px;
   font-size: 1rem;
   color: black;
   resize:none;
}
.column{
    display: flex;
   column-gap: 15px;
}
.container button{
    height: 42px;
    width: 572px;
    color: blue;
    font-size: 1rem;
    border: none;
    margin-top: 30px;
    cursor: pointer;
    border-radius: 8px;
    color: aliceblue;
    font-weight: 400;
    background-color: rgb(90, 90, 241);
    }

    h3 a{
        color: red;
        text-decoration: none;
        margin-left: 520px;


    }

</style>