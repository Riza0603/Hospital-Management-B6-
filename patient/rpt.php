<?php
include 'pdash.html';
session_start();

if(isset($_GET['iii']) && isset($_GET['nnn']) && isset($_GET['ddd']) && isset($_GET['id'])) {
    $patientId = $_GET['iii'];
    $patientName = $_GET['nnn'];
    $patientdate = $_GET['ddd'];
    $docid = $_GET['id'];


    $con = mysqli_connect("localhost", "root", "", "hospital");
    if(mysqli_connect_errno()) {
        echo "Could not connect to the database";
        exit;
    }
    $query = "SELECT * FROM medicine WHERE pid = '$patientId' and dat='$patientdate' and did='$docid'";
    $result = $con->query($query);
    $qr="select * from doctor where did='$docid'";
	            $res=$con->query($qr);
                $a=$res->fetch_assoc();
                {
                    $dn= $a['dname'];
                    $dm= $a['dmob'];
                }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        .receipt {
            width: 70%;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 50px;
        }

        .receipt h2 {
            text-align: center;
            margin-top: 0;
            color: #333;
        }

        .patient-info {
            margin-bottom: 20px;
        }

        .patient-info strong {
            color: #555;
        }

        .medicine-table {
            width: 100%;
            border-collapse: collapse;
        }

        .medicine-table th,
        .medicine-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .medicine-table th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        .medicine-table td {
            color: #555;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #333;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
        .patient-id {
            text-align: left;
        }

        .patient-details {
             text-align: right;
        }

        .patient-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <div class="receipt">
        <h2>Medicine Receipt</h2>
        <div class="patient-info">
    <div class="patient-id">
        <strong>Patient ID:</strong> <?php echo $patientId; ?><br>
        <strong>Patient Name:</strong> <?php echo $patientName; ?>
    </div>
    <div class="patient-details">
        <strong>Doctor Name:</strong> <?php echo $dn; ?><br>
        <strong>Doctor Mobile:</strong> <?php echo $dm; ?>
    </div>
        </div>
        <table class="medicine-table">
            <thead>
                <tr>
                    <th>Medicine Name</th>
                    <th>Quantity</th>
                    <th>Morning</th>
                    <th>Afternoon</th>
                    <th>Night</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['medi']."</td>";
                    echo "<td>".$row['qty']."</td>";
                    echo "<td>".$row['mng']."</td>";
                    echo "<td>".$row['aftr']."</td>";
                    echo "<td>".$row['ngt']."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <br>
    <h4><a href="vmed.php">BACK</a></h4>
</body>
</html>

<?php
} else {
    echo "<script>alert('Invalid parameters');</script>";
    echo '<script>window.location.href="viewmed.php";</script>';
    exit;
}
?>
