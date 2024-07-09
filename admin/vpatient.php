
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
          <span class="dashboard">Patients</span>
        </div>
      </nav>
      <div class="home-content">
<style>
      table {
        border-collapse: collapse;
        width: 100%;
        margin: 0 auto;
        font-family: Arial, sans-serif;
        font-size: 14px;
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
	  </style>
    <div class="container">
<br><br><table border="3">
<thead>
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
<th>username</th>
<th>Password</th>
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
$usr=$r['puser'];
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
echo "<td>".$r['puser']."</td>";
echo "<td>".$r['ppass']."</td>";
echo '</tr>';
}
echo "</table>";
?>

<br><h4><a href="dash.php">BACK</a></h4>
</div>
      </div>
    </section>
</body>
</html>