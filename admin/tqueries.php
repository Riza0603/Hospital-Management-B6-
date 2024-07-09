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
          <span class="dashboard">Queries</span>
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
          
          .b1 a {
            color: white;
            text-decoration: none;
          }
          
          h1 {
            text-align: center;
            transform: translate(500px,100px);
            width: 500px;
            height: 100px;
            color: red;
            background-color: lightgray;
            padding: 20px;
            border: 1px solid gray;
          }
          
          h2 {
            transform: translate(20px,100px);
          }
        </style>
        <div class="container"><br><br>
          <?php
          $con = mysqli_connect("localhost", "root", "", "hospital");
          if(mysqli_connect_errno()) {
            echo "Could not connect";
            exit;
          }
          
          $today = date("Y-m-d");
          $qry = "SELECT q.pid, p.pname, p.pmob, q.sub FROM queries q JOIN patient p ON q.pid = p.pid WHERE q.date = '$today'";
          $result = $con->query($qry);
          
          if($result->num_rows != 0) {
            echo '<table id="myTable" border="3">
                    <thead>
                      <tr>
                        <th>Patient Id</th>
                        <th>Patient Name</th>
                        <th>Mobile no</th>
                        <th>Queries</th>
                      </tr>
                    </thead>';
            while($r = $result->fetch_assoc()) { 
              echo "<tr>";
              echo "<td>".$r['pid']."</td>";
              echo "<td>".$r['pname']."</td>";
              echo "<td>".$r['pmob']."</td>";
              echo "<td>".$r['sub']."</td>";
              echo '</tr>';
            }
            echo "</table>";
            echo '<br><h4><a href="dash.php">BACK</a></h4>';
          } else {
            echo "<h1>No Query For Today</h1>";
            echo '<br><h2><a href="dash.php">BACK</a></h2>';
          }
          ?>
        </div>
      </div>
    </section>
  </body>
</html>
