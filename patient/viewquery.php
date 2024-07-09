<?php
 include 'pdash.html';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>View Queries</h3>
<div class="form">
<table id="myTable" border="3" >
<thead class="head">
<tr>
<th>Date</th>
<th>your queries</th>
<th>responce for the query</th>
</tr>
</thead>
    <?php
	session_start();
	include 'connect.php';
			$r=$_SESSION['us'];
$p="select pid from patient where puser='$r'";
$rl=$con->query($p);
while($s=$rl->fetch_assoc())
{                 
    $pi=$s['pid'];
} 
                $con=mysqli_connect("localhost","root","","hospital");
	            if(mysqli_connect_errno())
	            {
	            	echo"could not connect";
	            	exit;
	            }
	            $qry="select * from queries where pid='$pi'";
	            $result=$con->query($qry);

            while($r=$result->fetch_assoc())
            { 
                    $qid=$r['qid'];
                    echo "<tr>";
                    echo "<td>".$r['date']."</td>";
                    echo "<td>".$r['sub']."</td>";
                    echo "<td>".$r['reply']."</td>";

            echo'</tr>';
}
echo "</table>";
?>

</div>
<br><h4><a href="pdash.html">BACK</a></h4>

</body>
 
<style>
	h3{
		margin-left: 650px;
		font-size: 30px;
		color:gray;
		margin-bottom: 0px;
		margin-top:5px;
	}
      table {
        border-collapse: collapse;
        width: 100%;
        margin: 0 auto;
        font-family: Arial, sans-serif;
        font-size: 14px;
      }
	  .head{
		position:sticky;
		z-index: 1;
		top:0;
	  }
	  .form {
		margin-top:50px;
		overflow: auto;
		display:flex;
		flex-direction :column;
		align-items: center;
		max-height:400px;
	  }
      
      th, td {
        text-align: left;
        padding: 10px;
        border-bottom: 1px solid #ddd;
		text-align: center;
      }
      
      th {
        background-color: #333;
        color: white;
      }
      
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      tr:nth-child(odd) {
        background-color: #f2f2f2;
      }
      
      tr:hover {
        background-color: #ddd;
      }
	  .txt{
		padding-top: 10px;
    	border-top-width: 2px;
		font-size: large;
	  }
	  .b1 {
  		display: inline-block;
 		 padding: 10px 20px;
 		 background-color: blue;
 		 color: blue;
 		 text-decoration: none;
  		border-radius: 5px;
  		transition: background-color 0.2s ease-in-out;
		}

		.b1 a{
			color: white;
			text-decoration: none;
		}
		.b2 a{
			color: white;
			text-decoration: none;
		}
		.b2 {
  		display: inline-block;
 		 padding: 10px 20px;
 		 background-color: red;
 		 color: red;
 		 text-decoration: none;
  		border-radius: 5px;
  		transition: background-color 0.2s ease-in-out;
		}
</style>
</html>