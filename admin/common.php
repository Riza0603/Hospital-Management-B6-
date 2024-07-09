
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="dash.css">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-plus-medical'></i>
      <span class="logo_name">Hospital Admin</span><br><br>
    </div>
      <ul class="nav-links">
       
        <li>
          <a href="adoctor.php">
            <i class='bx bx-plus-medical'></i>
            <span class="links_name">Doctor</span>
          </a>
          
        </li>
        <li>
          <a href="apatient.php">
            <i class='bx bx-user'></i>
            <span class="links_name">patients</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-search-alt' ></i>
            <span class="links_name">Search patients</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bxs-file-doc'></i>
            <span class="links_name">Appointment History</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-conversation'></i>
            <span class="links_name">Contect us queries</span>
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
        <span class="dashboard">Dashboard</span>
      </div>
     
    </nav>

    <div class="home-content">
       
    
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
    <div class="container">
<?php
$con=mysqli_connect("localhost","root","","hospital");
	            if(mysqli_connect_errno())
	            {
	            	echo"could not connect";
	            	exit;
	            }
	            $qry="select * from doctor";
	            $result=$con->query($qry);
echo '<br><br><table class="table table-bordered border-primary" border="3">';
echo'<thead class="table-primary">';
echo'<tr>
<th>ID</th>
<th>Name</th>
<th>Mobile no</th>
<th>specialization</th>
<th>Qualification</th>
<div class="address">
<th>Address</th>
<th>DOB</th>
<th>Gender</th>
<th>Staring time</th>
<th>End time</th>
<th>username</th>
<th>Password</th></tr>
</thead>';
while($r=$result->fetch_assoc())
{ 
echo "<tr>";
echo "<td>".$r['id']."</td>";
echo "<td>".$r['name']."</td>";
echo "<td>".$r['mobile']."</td>";
echo "<td>".$r['special']."</td>";
echo "<td>".$r['degree']."</td>";
echo "<td>".$r['address']."</td>";
echo "<td>".$r['dob']."</td>";
echo "<td>".$r['gender']."</td>";
echo "<td>".$r['stime']."</td>";
echo "<td>".$r['etime']."</td>";
echo "<td>".$r['user']."</td>";
echo "<td>".$r['pass']."</td>";
echo '</tr>';

}
echo "</table>";
?>

<br><h4><a href="dash.php">BACK</a></h4>
</div>
</body>
</html>

    

      </div>
   
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function()
 {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

