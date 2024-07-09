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
        </style>
        <div class="container"><br><br>
          <div class="form">
            <table id="myTable" border="3">
              <thead class="head">
                <tr>
                  <th>Patient Id</th>
                  <th>Patient Name</th>
                  <th>Mobile no</th>
                  <th>Queries</th>
                  <th>Response</th>
                  <th>View and reply for query</th>
                </tr>
              </thead>
              <?php
              $con = mysqli_connect("localhost", "root", "", "hospital");
              if(mysqli_connect_errno()) {
                echo "Could not connect";
                exit;
              }
              
              $qry = "SELECT q.pid, p.pname, p.pmob, q.sub, q.reply, q.qid FROM queries q JOIN patient p ON q.pid = p.pid";
              $result = $con->query($qry);

              while($r = $result->fetch_assoc()) { 
                $qid = $r['qid'];
                echo "<tr>";
                echo "<td>".$r['pid']."</td>";
                echo "<td>".$r['pname']."</td>";
                echo "<td>".$r['pmob']."</td>";
                echo "<td>".$r['sub']."</td>";
                if ($r['reply'] != "") {
                  echo "<td>".$r['reply']."</td>";
                  echo '<td><span class="error">Response already provided</span></td>';
              } else {
                  echo "<td></td>";
                  echo '<td><a href="responce.php?pu='.$qid.'" class="b1">View And Reply</a></td>';
              }
                echo'</tr>';
              }
              echo "</table>";
              ?>
            </div>
          </div>
          <br><h4><a href="dash.php">BACK</a></h4>
        </div>
      </div>
    </section>
  </body>
</html>
