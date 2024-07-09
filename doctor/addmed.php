<?php
session_start();
include 'connect.php';
include 'ddash.html';
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
<style>
    .container{
      max-height: 450px;
      overflow-y: auto;
    }
      table {
        border-collapse: collapse;
        width: 100%;
        margin: 0 auto;
        font-family: Arial, sans-serif;
        font-size: 14px;
		text-align: center;
      }
      
      th, td {
        text-align: left;
        padding: 10px;
        border-bottom: 1px solid #ddd;
		text-align: center;
      }
      
      th {
        position: sticky;
        top: 0;
        background-color: #333;
        color: white;
      }
      
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      
      tr{
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
 		 background-color: green;
 		 color: white;
 		 text-decoration: none;
  		border-radius: 5px;
  		transition: background-color 0.2s ease-in-out;
		}

   .button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        cursor: pointer;
      }
      .button:hover {
        background-color: red;
      }
      .edit {
        background-color: #008CBA;
      }
    </style>
    <br><br><br><br>
    <div class="container">
<table id="myTable" border="3">
<thead class="table-primary">
<tr>
<th>Patient Id</th>
<th>Patient Name</th>
<th>Mobile no</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
<th>Add Medicine</th>
</tr>
</thead>

<?php
$r=$_SESSION['ds'];
$con=mysqli_connect("localhost","root","","hospital");
if(mysqli_connect_errno())
{
    echo"could not connect";
    exit;
}
$da=date("Y-m-d");

$qr="SELECT * FROM doctor WHERE duser='$r'";
$res=$con->query($qr);
$a=$res->fetch_assoc();
{
    $na= $a['dname'];
    $id= $a['did'];
}

$qry="SELECT a.pid, a.date, a.time, a.status, p.pname, p.pmob FROM appointment a INNER JOIN patient p ON a.pid = p.pid WHERE a.did='$id' AND a.date='$da' AND a.status='Consulted'";
$result=$con->query($qry);

while($r=$result->fetch_assoc())
{
    $i= $r['pid'];
    $name= $r['pname'];
    echo "<tr>";
    echo "<td>".$r['pid']."</td>";
    echo "<td>".$r['pname']."</td>";
    echo "<td>".$r['pmob']."</td>";
    echo "<td>".$r['date']."</td>";
    echo "<td>".$r['time']."</td>";
    echo "<td>".$r['status']."</td>";
    echo '<td><a href="medform.php?ii='.$i.'&nn='.$name.'" class="button edit">Add Medicine</a></td>
    </tr>';
}
?>
    </table>
</body>
</html>
