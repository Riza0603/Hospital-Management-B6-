<?php
session_start();
unset($_SESSION['ds']);
session_destroy();
header("Location:doctorlog.php");
exit();
?>