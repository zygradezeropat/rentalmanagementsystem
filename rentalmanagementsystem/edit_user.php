<?php
include 'connect.php';
session_start();

if (isset($_GET['submit'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['edit_id']);
    $uname = validate($_GET['username']);
    $pass = validate($_GET['pass']);

    $fetchQuery = $conn->query("SELECT * FROM `user` WHERE id = '$id'");
    $existingUserData = $fetchQuery->fetch_assoc();

    if ($existingUserData) {
   
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

       
        $sql = $conn->query("UPDATE `user` SET `user_name`='$uname', `pass`='$hashedPassword' WHERE id = '$id'");
        
        if ($sql) {
            header("location: user.php?edit=success");
        } else {
            header("location: user.php?edit=unsuccessful");
        }
    } else {
        header("location: user.php?edit=unsuccessful");
    }
} else {
    header("location: user.php?edit=unsuccessful");
    exit();
}

$conn->close();
?>
