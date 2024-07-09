<?php
include 'connect.php';
$sql="select * from doctor";
$rslt=$con->query($sql);
$d=$rslt->num_rows;

$qry="select * from patient";
$rslt=$con->query($qry);
$p=$rslt->num_rows;

$today = date("Y-m-d");
$qry1="select * from appointment where date='$today'";
$rslt=$con->query($qry1);
$a=$rslt->num_rows;

$qry2="select * from queries where date='$today'";
$rslt=$con->query($qry2);
$q=$rslt->num_rows;
?>
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
        <span class="dashboard">Dashboard</span>
      </div>
     
    </nav>

    <div class="home-content">
        <div class="cards1">
          <div class="card">
            <div class="box">
              <h2>Doctor</h2>
              <h1><?php echo $d; ?></h1>
              <a href="vdoctor.php">
              <button type="submit"  class="btn" style="height: 37.2px; width:100px;font-size: 20px;">view</button>
              </a>
            </div>
            <div class="icon">
              <i class="fa-sharp fa-light fa-graduation-cap"></i>
            </div>
          </div>
    
          
          <div class="card">
            <div class="box">
              <h2>Patient</h2>
              <h1><?php echo $p; ?></h1>
              <a href="vpatient.php">
              <button type="submit"  class="btn" style="height: 37.2px; width:100px;font-size: 20px;">view</button>
              </a>
            </div>
            <div class="icon">
              
            </div>
          </div>
          <div class="cards2">
            <div class="card1">
              <div class="box">
                <h2 style="width: 250px; font-size: 35px;">Today's Appointment</h2>
                <h1><?php echo $a; ?></h1>
                <a href="tapphistory.php">
                <button type="submit"  class="btn" style="height: 37.2px; width:100px;font-size: 20px; margin-top: 5px;">view</button>
                </a>
              </div>
              <div class="icon">
                <i class="fa-sharp fa-light fa-graduation-cap"></i>
              </div>
            </div>
      
            
            <div class="card3">
              <div class="box">
                <h2 style="font-size: 35px;">Today's</br>query</h2>
                <h1><?php echo $q; ?></h1>
                <a href="tqueries.php">
                <button type="submit"  class="btn" style="height: 37.2px; width:100px;font-size: 20px; margin-top: 5px;">view</button>
                </a>
              </div>
              <div class="icon">
              
              </div>
            </div>
       
    

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

