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
	.table-container {
    max-height: 450px; 
    overflow-y: auto; 
    margin-bottom: 20px;
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
 		 background-color: blue;
 		 color: white;
 		 text-decoration: none;
  		border-radius: 5px;
  		transition: background-color 0.2s ease-in-out;
		}

		
		.b2 {
  		display: inline-block;
 		 padding: 10px 20px;
 		 background-color: red;
 		 color: white;
 		 text-decoration: none;
  		border-radius: 5px;
  		transition: background-color 0.2s ease-in-out;
		}
		
    </style>
    <div class="container"><br><br>
<input type="text" id="myInput" class="txt" placeholder="search by Date" onkeyup="searchFun()">
<div class="table-container">
<table id="myTable" border="3">
<thead class="table-primary">
<tr>
<th>Patient Id</th>
<th>Patient Name</th>
<th>Mobile no</th>
<th>Specialization</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
<th>Consultation</th>
</tr>
</thead>

<?php
$r=$_SESSION['ds'];
$con=mysqli_connect("localhost","root","","hospital");
if(mysqli_connect_errno()) {
	echo "Could not connect to database";
	exit;
}

$qr="SELECT * FROM doctor WHERE duser='$r'";
$res=$con->query($qr);
$a=$res->fetch_assoc();

$na = $a['dname'];
$id = $a['did'];
$date = date("Y-m-d");

$qry = "SELECT appointment.pid, patient.pname, patient.pmob, doctor.spec, appointment.date, appointment.time, appointment.status FROM appointment
        JOIN patient ON appointment.pid = patient.pid
        JOIN doctor ON appointment.did = doctor.did
        WHERE appointment.did='$id' AND appointment.date='$date' AND (appointment.status='Confirmed' OR appointment.status='Consulted')";
$result = $con->query($qry);

while($r = $result->fetch_assoc()) { 
    $i = $r['pid'];
    $d = $r['date'];
    $t = $r['time'];
    
    echo "<tr>";
    echo "<td>".$r['pid']."</td>";
    echo "<td>".$r['pname']."</td>";
    echo "<td>".$r['pmob']."</td>";
    echo "<td>".$r['spec']."</td>";
    echo "<td>".$r['date']."</td>";
    echo "<td>".$r['time']."</td>";
    echo "<td>".$r['status']."</td>";
    echo '<td><a href="cons.php?con='.$i.'&dd='.$d.'&tt='.$t.'" class="b1">Consult</a></td>';
    echo "</tr>";
}
echo "</table>";
?>
</div>
</div>
<script>
function searchFun() {
	let filter = document.getElementById('myInput').value.toUpperCase();
	let myTable = document.getElementById('myTable');
	let tr = myTable.getElementsByTagName('tr');
	
	for (var i = 0; i < tr.length; i++) {
		let td = tr[i].getElementsByTagName('td')[4];
		if (td) {
			let textvalue = td.textContent || td.innerHTML;

			if (textvalue.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
		}
	}
}
</script>
</body>
</html>
