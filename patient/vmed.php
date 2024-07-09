<?php
include 'pdash.html';
session_start();
?>
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

      tr:nth-child(odd) {
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

      .multiline-textbox {
            width: 250px;
            height: 50px;
            resize: none;
            font-size: large;

        }
        .button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        cursor: pointer;
      }
      .edit {
        background-color: #008CBA;
      }
      .err{
			display: none;
			 color: red;
			 font-size: 40px;
		}
      
	  </style>
    <div class="container">
<br><br>
<span id="error-message" class="err">No matching items found</span>
	<input type="text" id="myInput" placeholder="Search by Date" onkeyup="searchFun()" class="txt" required><table border="3" id="myTable">
<thead>
<tr>
<th>Doctor Name</th>
<th>Specialization</th>
<th>Date</th>
<th>Medicine</th>
</tr>
</thead>
<?php
$r=$_SESSION['us'];

$con=mysqli_connect("localhost","root","","hospital");
if(mysqli_connect_errno())
{
    echo"could not connect";
    exit;
}

$qr="SELECT pid FROM patient WHERE puser='$r'";
$res=$con->query($qr);
$a=$res->fetch_assoc();
{
    $id= $a['pid'];
}

$qqr="SELECT * FROM medicine WHERE pid='$id'";
$ress=$con->query($qqr);
$e=$ress->num_rows;
if($e==0)
{
    exit;
}
else
{
    $c=$ress->fetch_assoc();
    {
        $dd= $c['did'];
    }
}

$q="SELECT dname, spec FROM doctor WHERE did='$dd'";
$re=$con->query($q);
$z=$re->fetch_assoc();
{
    $na= $z['dname'];
    $sp= $z['spec'];
}

$date = date("Y-m-d");
$qry="SELECT DISTINCT m.pid, p.pname, m.dat FROM medicine m INNER JOIN patient p ON m.pid = p.pid WHERE m.pid='$id' ORDER BY m.dat DESC";
$result=$con->query($qry);

while($r=$result->fetch_assoc())
{ 
    $ii= $dd;
    $da= $r['dat'];
    $i= $r['pid'];
    $n= $r['pname'];
    echo "<tr>";
    echo "<td>".$na."</td>";
    echo "<td>".$sp."</td>";
    echo "<td>".$r['dat']."</td>";
    echo '<td><a href="rpt.php?iii='.$i.' & nnn='.$n.' & ddd='.$da.' & id='.$ii.'" class="button edit">View Medicine</a></td>';
    echo '</tr>';
}
echo "</table>";
?>

<br><h4><a href="pdash.html">BACK</a></h4>
</div>
<script>
function searchFun() {
  let filter = document.getElementById('myInput').value.toUpperCase();
  let myTable = document.getElementById('myTable');
  let tr = myTable.getElementsByTagName('tr');
  let matchFound = false;

  for (var i = 0; i < tr.length; i++) {
    let td = tr[i].getElementsByTagName('td')[2];
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
