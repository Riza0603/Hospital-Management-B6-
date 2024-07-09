<?php
 include 'pdash.html';
?>
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
                        
                    }
?>
    <?php
    
if (isset($_POST['submit']))
{
   
    $sub = $_POST['sub'];
    $ii=$i;
    $date=date("y-m-d");
	$con = mysqli_connect("localhost","root","","hospital");
                    if (mysqli_connect_errno()) 
                    {
                        echo "could not connect";
                        exit;
					}
                    $qry ="insert into queries(pid,sub,date)values('".$ii."','".$sub."','".$date."')";
                    $rslt=$con->query($qry);
                    if($rslt) 
                    {
                        
                        echo"<script>alert('uploaded succesfully');</script>";
                        echo'<script>window.location.href="pdash.html";</script>';
                    } 

}
?>
<form action="" method="POST" class="form">
<div class="container">
<div class="column">
                <div class="inputbox">
                    <label>Full Name :<pre></pre></label>
                    <input type="text" readonly name="na" value=<?php echo $n;?>>
                </div>
                <div class="inputbox">
                    <label>Mobile Number :<pre></pre></label>
                    <input type="number" readonly name="ca" value=<?php echo $m;?>>
                </div>
             </div>
<div class="inputbox">	
<label>what's your query ?</label><br><br>	 
<textarea name="sub" rows="4" cols="50" required >
</textarea>
</div>
<button type="submit" value="submit" name="submit">upload</button>
</div>  
</Form>

         </body>
         <style>
            *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    font-family: sans-serif;
    background-image: url(p1.jpg);
    
    font-family: sans-serif;
    background-image: url(p1.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 90vh;
    background-position-y:100px ;
}

.menubar{
    background-color:black;
   height: 100px;
   width: 100%;
   display: flex;
   align-items: center;
   justify-content: space-between;
   padding: 0 5%;
   opacity: 0.7;
}
.logo{
    color: rgb(254, 4, 4);
    font-size: 30px;
}
.menubar ul{
    list-style: none;
    display: flex;
}
.menubar ul li{
    padding: 10px 30px;  
    position: relative;
}
.menubar ul li a{
    color: rgb(249, 245, 245);
    text-decoration: none;
    font-size: 20px;
    transition: all 0.3s;
}
.menubar ul li a:hover{
    color: blue;
}
.dropdownmenu{
    display: none;
}
.menubar ul li:hover .dropdownmenu{
    display: block;
    position: absolute;
    left: 0;
    top: 100%;
    background-color: black;
}
.dropdownmenu ul{
display: block;
margin: 10px;
}
.dropdownmenu ul li{
    width: 150px;
    padding: 10px;
}
.container{
    position: relative;
    max-width: 600px;
    width: 100%;
    background-color: rgb(9, 9, 9);
    padding: 25px;
  box-shadow: 0 0 15px rgba(0,0,0,0.1);
  left: 550px;
  opacity: 0.7;
  top: 80px;
  border-radius: 15px;
}

.inputbox{
    width: 80%;
    margin-top: 20px;
    display: block;
    border-color: black;
}

.inputbox label{
    color: rgb(248, 247, 249);
}

.inputbox input{
    position: relative;
    height: 50px;
    width: 200px;
    border-color: black;
    font-size: 1rem;
    color: rgb(17, 16, 16);
    margin-top: 8px;
    border: 1px solid white;
    border-radius: 10px;
    padding: 0 15px;
}
.inputbox textarea{
    border-radius: 10px;
   height: 70px;
   font-size: 1rem;

}
.container button{
    height: 55px;
    width: 100%;
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
    </style>
</html>

