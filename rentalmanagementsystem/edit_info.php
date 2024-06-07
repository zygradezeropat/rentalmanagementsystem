<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: profile_edit.php?edit=success.php');
} else {
}
$id = $_SESSION['user'];

if (isset($_POST['submit'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $fname = validate($_POST['firstname']);
    $mname = validate($_POST['middlename']);
    $lname = validate($_POST['lastname']);
    $phone = validate($_POST['contact']);
    $email = validate($_POST['email']);
    $address = validate($_POST['address']);
    $user = validate($_POST['user']);
    $pass = validate($_POST['pass']);

    $username = $fname . " " . $mname . " " . $lname;

    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
            

    $conn->query("UPDATE `renters` SET 
    `firstname`='$fname',`middlename`='$mname',`lastname`='$lname',
    `email`='$email',`address`='$address',`contact`='$phone' WHERE id = '$id'");

    $sql = $conn->query("UPDATE `user`
    SET 
        `name`='$username', 
        `user_name`='$user', 
        `pass`='$hashedPassword' 
    WHERE id = '$id';
    ");

    header("location: profile_edit.php?edit=success");




 
    $conn->close();
    exit();
} else {
    header("location: profile_edit.php?edit=success");
    exit();
}
