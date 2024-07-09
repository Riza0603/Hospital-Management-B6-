<?php
session_start();
include 'connect.php';

if (isset($_POST['submit'])) {
    $r = $_SESSION['ds'];
    $pid = $_POST['pid'];
    $medicine_names = $_POST['medicine_name'];
    $quantities = $_POST['quantity'];
    $mornings = $_POST['morning'];
    $afternoons = $_POST['afternoon'];
    $nights = $_POST['night'];
    $date = date("Y-m-d");

    $qr = "SELECT * FROM doctor WHERE duser = ?";
    $stmt = $con->prepare($qr);
    $stmt->bind_param("s", $r);
    $stmt->execute();
    $res = $stmt->get_result();
    
    if ($res->num_rows > 0)
     {
        $a = $res->fetch_assoc();
        $di = $a['did'];

        $stmt = $con->prepare("INSERT INTO medicine (did, pid, medi, qty, mng, aftr, ngt, dat) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $existingMedicines = array();
        $checkStmt = $con->prepare("SELECT medi FROM medicine WHERE pid = ? AND dat = ?");
        $checkStmt->bind_param("ss", $pid, $date);
        $checkStmt->execute();
        $checkRes = $checkStmt->get_result();
        
        while ($row = $checkRes->fetch_assoc()) {
            $existingMedicines[] = $row['medi'];
        }

        foreach ($medicine_names as $index => $medicine_name) {
            $quantity = $quantities[$index];
            $morning = $mornings[$index];
            $afternoon = $afternoons[$index];
            $night = $nights[$index];
            
            if (in_array($medicine_name, $existingMedicines)) {
                echo "<script>alert('Dublicate entry of medicine name');</script>";
                echo '<script>window.location.href="addmed.php";</script>';
                exit;
            }

            $stmt->bind_param("ssssssss", $di, $pid, $medicine_name, $quantity, $morning, $afternoon, $night, $date);
            $stmt->execute();
        }

        $stmt->close();
        $con->close();

        echo "<script>alert('Medicine added successfully');</script>";
        echo '<script>window.location.href="viewmed.php";</script>';
        exit;
    } 
    else 
    {
        echo "<script>alert('Doctor not found');</script>";
        echo '<script>window.location.href="addmed.php";</script>';
        exit;
    }
}
?>
