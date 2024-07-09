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
        <span class="dashboard">Patient</span>
      </div>
     
    </nav>

    <div class="home-content">
        
    <div class="module">
  <div class="box">
    <h2>View Patient</h2>
    <p>**********************</p>
    <a href="aPatient.php" class="button">View</a>
  </div>
</div>

<style>
.module {
  margin-top: 100px;
  display: flex;
  align-items: center;
}

.box {
      width: 25%;
    background-color: darkgrey;
    padding: 20px;
    border: 1px solid #ddd;
    align-items: center;
    text-align: center;
    margin-left: 400px;
    margin-right: 50px;
}

.box:hover{
  display: inline;
}

.box h2 {
  margin-top: 0;
}

.box p {
  margin-bottom: 20px;
}

.button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.2s ease-in-out;
}

.button:hover {
  background-color: #0062cc;
}

</style>
    

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