
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="adoctor.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<h3>patient Detailes</h3>
<style>
	
	h3{
		margin-left: 650px;
		font-size: 30px;
		color:blue;
		margin-bottom: 0px;
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
  		border-radius: 5px;
		text-decoration: none;
  		transition: background-color 0.2s ease-in-out;
		}

		.err{
			display: none;
			 color: red;
			 font-size: 40px;
		}
		

    </style>
    <div class="container"><br><br>
	<span id="error-message" class="err">No matching items found</span>
	<input type="text" id="myInput" placeholder="Search by Name" onkeyup="searchFun()" class="txt" required>
<div class="form">
<table id="myTable" border="3">
<thead class="head">
<tr>
<th>ID</th>
<th>Name</th>
<th>Mobile no</th>
<th>Blood</th>
<th>Aadhar</th>
<th>Address</th>
<th>Father</th>
<th>DOB</th>
<th>Gender</th>
<th>Status</th>
<th>username</th>
<th>Password</th>
<th>Update</th>
<th>Delete</th>
</tr>
</thead>
<?php
$con=mysqli_connect("localhost","root","","hospital");
	            if(mysqli_connect_errno())
	            {
	            	echo"could not connect";
	            	exit;
	            }
	            $qry="select * from patient";
	            $result=$con->query($qry);

while($r=$result->fetch_assoc())
{ 
$usr=$r['pid'];
echo "<tr>";
echo "<td>".$r['pid']."</td>";
echo "<td>".$r['pname']."</td>";
echo "<td>".$r['pmob']."</td>";
echo "<td>".$r['blood']."</td>";
echo "<td>".$r['adhar']."</td>";
echo "<td>".$r['padd']."</td>";
echo "<td>".$r['father']."</td>";
echo "<td>".$r['pdob']."</td>";
echo "<td>".$r['pgen']."</td>";
echo "<td>".$r['status']."</td>";
echo "<td>".$r['puser']."</td>";
echo "<td>".$r['ppass']."</td>";
echo '<td><a href="updatepat.php?pupt='.$usr.'" class="b1">Update</a></td>
<td><a href="deletepatient.php?pdel='.$usr.'" class="b2">Delete</a></td>
</tr>';
}
echo "</table>";
?>
</div>
<br><h4><a href="patient.php">BACK</a></h4>
</div>
<script>
function searchFun() {
  let filter = document.getElementById('myInput').value.toUpperCase();
  let myTable = document.getElementById('myTable');
  let tr = myTable.getElementsByTagName('tr');
  let matchFound = false;

  for (var i = 0; i < tr.length; i++) {
    let td = tr[i].getElementsByTagName('td')[1];
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