<?php
include 'connect.php';

if (isset($_GET['submit'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $fname = validate($_GET['fname']);
    $mname = validate($_GET['mname']);
    $lname = validate($_GET['lname']);
    $phone = validate($_GET['phone']);
    $email = validate($_GET['email']);
    $address = validate($_GET['address']);
    $room = validate($_GET['room']);
    $date = validate($_GET['date']);
    $gender = validate($_GET['gender']);
    $fullname = $fname . " " . $mname . " " . $lname;

    //new addition
    $check = mysqli_query($conn, "SELECT * FROM rooms WHERE room_num = '$room'");
    while ($row = $check->fetch_assoc()) :
        $total = $row['total_bed_avail'];
        $checkf = $total - 1;
    endwhile;


    $sql = $conn->query("INSERT INTO renters (firstname, middlename, 
    lastname, email, address, contact, room_id, date_in, gender) VALUES ('$fname', '$mname', '$lname', '$email', '$address',
     '$phone', '$room', '$date', '$gender')");
     

    $conn->query("INSERT INTO renters_info (room_id, date_in) VALUES ('$room', '$date')");

    $update = $conn->query("UPDATE rooms SET total_bed_avail = '$checkf' WHERE room_num = '$room'");
    $add = 1234;
    $password = password_hash($add, PASSWORD_DEFAULT);

    $sql2 = $conn->query("INSERT INTO user (name, user_name, pass, type) VALUES ('$fullname', '$fname', '$password' , 'renter')");
    header("location: renter.php?added");
} else {
    header("location: index.php");
    exit();
}

$conn->close();
