<?php
session_start();
include 'connect.php';
include 'ddash.html';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
	.table-container {
		max-height: 233px;
		overflow-y: auto;
		margin-bottom: 20px;
	}

	table {
		border-collapse: collapse;
		width: 100%;
		margin: 0 auto;
		font-family: Arial, sans-serif;
		font-size: 14px;
		text-align: center;
	}

	#todayTable th,
	#todayTable td {
		padding: 10px;
		border-bottom: 1px solid #ddd;
		text-align: center;
	}

	#remainingTable th,
	#remainingTable td {
		padding: 10px;
		border-bottom: 1px solid #ddd;
		text-align: center;
	}

	#remainingTable th,
	#todayTable th {
		position: sticky;
		top: 0;
		background-color: #333;
		color: white;
	}

	tr:nth-child(even) {
		background-color: #f2f2f2;
	}

	tr {
		background-color: #ddd;
	}

	.txt {
		padding-top: 10px;
		border-top-width: 2px;
		font-size: large;
	}

	.b1 {
		display: inline-block;
		padding: 10px 20px;
		background-color: green;
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
</head>

<body>
	<div class="container">
		<?php
		$r = $_SESSION['ds'];
		$con = mysqli_connect("localhost", "root", "", "hospital");
		if (mysqli_connect_errno()) {
			echo "Could not connect";
			exit;
		}

		$qr = "SELECT * FROM doctor WHERE duser='$r'";
		$res = $con->query($qr);
		$a = $res->fetch_assoc();
		$na = $a['dname'];
		$id = $a['did'];

		$qry = "SELECT a.pid, p.pname, p.pmob, d.dname, d.spec, a.date, a.time, a.status 
				FROM appointment a
				INNER JOIN patient p ON a.pid = p.pid
				INNER JOIN doctor d ON a.did = d.did
				WHERE a.did = '$id'
				ORDER BY a.date ASC";
		$result = $con->query($qry);

		$today = date("Y-m-d");
		$next_day = date("Y-m-d", strtotime("+1 day"));
		$today_appointments = array();
		$remaining_appointments = array();

		while ($r = $result->fetch_assoc()) {
			if ($r['date'] == $today) {
				$today_appointments[] = $r;
			} else if ($r['date'] >= $next_day) {
				$remaining_appointments[] = $r;
			}
		}
		?>

		<br><br>
		<h2>Today's Appointments: (<?php echo $today; ?>)</h2>
		<div class="table-container">
			<table id="todayTable">
				<thead class="table-primary">
					<tr>
						<th>Patient Id</th>
						<th>Patient Name</th>
						<th>Mobile no</th>
						<th>Specialization</th>
						<th>Date</th>
						<th>Time</th>
						<th>Status</th>
						<th>Accept</th>
						<th>Reject</th>
					</tr>
				</thead>
				<?php foreach ($today_appointments as $r) : ?>
					<tr>
						<td><?php echo $r['pid']; ?></td>
						<td><?php echo $r['pname']; ?></td>
						<td><?php echo $r['pmob']; ?></td>
						<td><?php echo $r['spec']; ?></td>
						<td><?php echo $r['date']; ?></td>
						<td><?php echo $r['time']; ?></td>
						<td><?php echo $r['status']; ?></td>
						<td>
							<a href="accapp.php?acc=<?php echo $r['pid']; ?>&dd=<?php echo $r['date']; ?>&tt=<?php echo $r['time']; ?>" class="b1">Accept</a>
						</td>
						<td>
							<a href="rejapp.php?rej=<?php echo $r['pid']; ?>&dd=<?php echo $r['date']; ?>&tt=<?php echo $r['time']; ?>" class="b2">Reject</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>

	<div class="container">
		<h2>Remaining Appointments</h2>
		<span id="error-message" class="err">No matching items found</span>
	<input type="text" id="myInput" placeholder="Search by Date" onkeyup="searchFun()" class="txt" required>
			<div class="table-container">
			<table id="remainingTable">
				<thead class="table-primary">
					<tr>
						<th>Patient Id</th>
						<th>Patient Name</th>
						<th>Mobile no</th>
						<th>Specialization</th>
						<th>Date</th>
						<th>Time</th>
						<th>Status</th>
						<th>Accept</th>
						<th>Reject</th>
					</tr>
				</thead>
				<?php foreach ($remaining_appointments as $r) : ?>
					<tr>
						<td><?php echo $r['pid']; ?></td>
						<td><?php echo $r['pname']; ?></td>
						<td><?php echo $r['pmob']; ?></td>
						<td><?php echo $r['spec']; ?></td>
						<td><?php echo $r['date']; ?></td>
						<td><?php echo $r['time']; ?></td>
						<td><?php echo $r['status']; ?></td>
						<td>
							<a href="accapp.php?acc=<?php echo $r['pid']; ?>&dd=<?php echo $r['date']; ?>&tt=<?php echo $r['time']; ?>" class="b1">Accept</a>
						</td>
						<td>
							<a href="rejapp.php?rej=<?php echo $r['pid']; ?>&dd=<?php echo $r['date']; ?>&tt=<?php echo $r['time']; ?>" class="b2">Reject</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
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
