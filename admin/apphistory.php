<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="dash.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-plus-medical'></i>
      <span class="logo_name">Hospital Admin</span><br><br>
    </div>
      <ul class="nav-links">
      <li>
          <a href="dash.php">
            <i class='bx bx-plus-medical'></i>
            <span class="links_name">Dashboard</span>
          </a>
          
        </li>
        <li>
          <a href="doctor.php">
            <i class='bx bx-plus-medical'></i>
            <span class="links_name">Doctor</span>
          </a>
          
        </li>
        <li>
          <a href="patient.php">
            <i class='bx bx-user'></i>
            <span class="links_name">patients</span>
          </a>
        </li>
        <li>
          <a href="apphistory.php">
            <i class='bx bxs-file-doc'></i>
            <span class="links_name">Appointment History</span>
          </a>
        </li>
        <li>
          <a href="queries.php">
            <i class='bx bx-conversation'></i>
            <span class="links_name">Queries</span>
          </a>
        </li>
      </li>
      <li>
        <div class="logout">
        <a href="adminlog.php"> 
          <i class='bx bx-log-out'></i>
          <span class="links_name">log-out</log-out></span>
        </a>
        </div>
      </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Appointment History</span>
      </div>
     
    </nav>

    <div class="home-content">
    <?php
include 'connect.php';
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
      table {
        border-collapse: collapse;
        width: 100%;
        margin: 0 auto;
        font-family: Arial, sans-serif;
        font-size: 14px;
		text-align: center;
      }
      
	  .form {
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
<th>Id</th>
<th>Name</th>
<th>Mobile no</th>
<th>Specialization</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
</tr>
</thead>

<?php
$con=mysqli_connect("localhost","root","","hospital");
	            if(mysqli_connect_errno())
	            {
	            	echo"could not connect";
	            	exit;
	            }
                
              $qry="SELECT a.pid, p.pname, p.pmob, d.dname, d.spec, a.date, a.time, a.status FROM appointment a JOIN patient p ON a.pid = p.pid JOIN doctor d ON a.did = d.did";
	            $result=$con->query($qry);

while($r=$result->fetch_assoc())
{ 
echo "<tr>";
echo "<td>".$r['pid']."</td>";
echo "<td>".$r['pname']."</td>";
echo "<td>".$r['pmob']."</td>";
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
<script>
function searchFun() {
  let filter = document.getElementById('myInput').value.toUpperCase();
  let myTable = document.getElementById('myTable');
  let tr = myTable.getElementsByTagName('tr');
  let matchFound = false;

  for (var i = 0; i < tr.length; i++) {
    let td = tr[i].getElementsByTagName('td')[4];
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