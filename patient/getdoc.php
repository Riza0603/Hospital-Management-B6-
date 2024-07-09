<?php
$conn = mysqli_connect('localhost', 'root', '', 'hospital');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$spec = $_POST['spec'];

$sql = "SELECT dname, status FROM doctor WHERE spec = '$spec'";
$result = mysqli_query($conn, $sql);

$options = '';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $doctorName = $row['dname'];
        $status = $row['status'];

        if ($status === 'Available') {
            $options .= '<option value="' . $doctorName . '">' . $doctorName . '</option>';
        } else {
            $options .= '<option disabled>' . $doctorName . ' (Doctor not available)</option>';
        }
    }
}

mysqli_close($conn);

echo $options;
?>


