<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
} else {
}
$id = $_SESSION['admin'];

if (isset($_GET['submit'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $maintenanceId = validate($_GET['mainId']);
    $stat = validate($_GET['newstatus']);

    $conn->query("UPDATE maintenance
    SET `status` = '$stat'
    WHERE maintenance_id = $maintenanceId;
     ");





    header("location: maintenance_report.php?success=Data_Passed");
    $conn->close();
    exit();
} else {
    header("location: index.php");
    exit();
}
