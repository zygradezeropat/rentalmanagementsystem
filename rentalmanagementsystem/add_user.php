<?php
include("connect.php");
$name = $_POST['name'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$utype = $_POST['utype'];
$sql = "INSERT INTO user (name, user_name, pass, type) VALUES ('$name', '$uname', $pass, $utype)";


if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

