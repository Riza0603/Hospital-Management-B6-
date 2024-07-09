<?php
session_start();
include 'connect.php';
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
<h3>Appointment History</h3>
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
		text-align: center;
      }
	  
	  .head{
		position:sticky;
		z-index: 1;
		top:0;
	  }
	  .form {
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
      
      tr{
        background-color: #ddd;
      }

	  .txt{
		padding-top: 10px;
    	border-top-width: 2px;
		font-size: large;
	  }
	  .b2 {
  		display: inline-block;
 		 padding: 10px 20px;
 		 background-color: red;
 		 color: red;
  		border-radius: 5px;
  		transition: background-color 0.2s ease-in-out;
		}
		.b2 a{
			color: white;
			text-decoration: none;
		}
		.err{
			display: none;
			 color: red;
			 font-size: 40px;
		}

    </style>
    <div class="container"><br><br>
	<span id="error-message" class="err">No matching items found</span>
	<input type="text" id="myInput" placeholder="Search by Date" onkeyup="searchFun()" class="txt" required><div class="form">
<table id="myTable" border="3">
<thead class="head">
<tr>
<th>Doctor</th>
<th>Specialization</th>
<th>Date</th>
<th>Time</th>
<th>Booking Status</th>
</tr>
</thead>

<?php
$r=$_SESSION['us'];
$con=mysqli_connect("localhost","root","","hospital");
if(mysqli_connect_errno())
{
	echo "Could not connect";
	exit;
}

$p="select * from patient where puser='$r'";
$rl=$con->query($p);
while($s=$rl->fetch_assoc())
{                 
    $pi=$s['pid'];
} 


$qry="SELECT d.dname, d.spec, a.date, a.time, a.status FROM appointment a JOIN doctor d ON a.did = d.did WHERE a.pid = '$pi' ORDER BY a.date DESC";
$result=$con->query($qry);

while($r=$result->fetch_assoc())
{ 
echo "<tr>";
echo "<td>".$r['dname']."</td>";
echo "<td>".$r['spec']."</td>";
echo "<td>".$r['date']."</td>";
echo "<td>".$r['time']."</td>";
echo "<td>".$r['status']."</td>";
echo '</tr>';
}
echo "</table>";
?>
</div>
</div>
</div>
<script>
function searchFun() {
  let filter = document.getElementById('myInput').value.toUpperCase();
  let myTable = document.getElementById('myTable');
  let tr = myTable.getElementsByTagName('tr');
  let matchFound = false;

  for (var i = 0; i < tr.length; i++) {
    let td = tr[i].getElementsByTagName('td')[2];
    if (td) {
      let textvalue = td.textContent || td.innerHTML;

      if (textvalue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        matchFound = true;
      } else {
        tr[i].style.display = "none";
      }
    }
  }

  let errorMessage = document.getElementById('error-message');
  if (!matchFound) {
    errorMessage.style.display = "block";
  } else {
    errorMessage.style.display = "none";
  }
}
</script>
</body>
</html>
