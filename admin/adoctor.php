
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<h3>Doctor Detailes</h3>
<style>
	h3{
		margin-left: 650px;
		font-size: 30px;
		color:blue;
	}
      table {
        border-collapse: collapse;
        width: 100%;
        margin: 0 auto;
        font-family: Arial, sans-serif;
        font-size: 14px;
		
      }
	  .form{
		overflow: auto;
		display:flex;
		flex-direction :column;
		align-items: center;
		max-height:400px;
	  }
	   .head{
		position:sticky;
		z-index: 1;
		top:0;
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
 		 text-decoration: none;
  		border-radius: 5px;
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
<th>specialization</th>
<th>Qualification</th>
<th>Address</th>
<th>DOB</th>
<th>Gender</th>
<th>username</th>
<th>Password</th>
<th>Status</th>
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
	            $qry="select * from doctor";
	            $result=$con->query($qry);

while($r=$result->fetch_assoc())
{ 
$usr=$r['did'];
echo "<tr>";
echo "<td>".$r['did']."</td>";
echo "<td>".$r['dname']."</td>";
echo "<td>".$r['dmob']."</td>";
echo "<td>".$r['spec']."</td>";
echo "<td>".$r['degree']."</td>";
echo "<td>".$r['dadd']."</td>";
echo "<td>".$r['ddob']."</td>";
echo "<td>".$r['dgen']."</td>";
echo "<td>".$r['duser']."</td>";
echo "<td>".$r['dpass']."</td>";
echo "<td>".$r['status']."</td>";
echo '<td>
<a href="updatedoc.php?upt='.$usr.'" class="b1">Update</a></td>
<td><a href="deletedoc.php?del='.$usr.'" class="b2">Delete</a></td>
</tr>';
}
echo "</table>";
?>
</div>
<br><h4><a href="doctor.php">BACK</a></h4>
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