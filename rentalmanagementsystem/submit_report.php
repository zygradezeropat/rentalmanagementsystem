<?php
session_start();
include 'connect.php';

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$report = validate($_GET['report']);
$id = $_SESSION['user'];

$sql = $conn->query("INSERT INTO maintenance (issue, renter_id, status) VALUES ('$report', $id, 'Pending')");

    header("Location: userui.php?submited=data");
