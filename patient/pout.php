<?php
session_start();
unset($_SESSION['us']);
session_destroy();
header("Location:patientlog.php");
exit();
?>