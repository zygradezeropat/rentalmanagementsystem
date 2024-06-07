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
    $fname = validate($_GET['fname']);
    $mname = validate($_GET['mname']);
    $lname = validate($_GET['lname']);
    $phone = validate($_GET['phonenum']);
    $email = validate($_GET['emailadd']);
    $address = validate($_GET['address']);
    $room = validate($_GET['room']);
    $date = validate($_GET['date']);
    $gender = validate($_GET['gen']);
    $currentRoom = validate($_GET['room_num']);


    $check = mysqli_query($conn, "SELECT total_bed_avail FROM rooms WHERE room_num = '$room'");
    while ($row = $check->fetch_assoc()) :
        $total1 = $row['total_bed_avail'];
    endwhile;


    $check2 = mysqli_query($conn, "SELECT total_bed_avail FROM rooms WHERE room_num = '$currentRoom'");
    while ($row2 = $check2->fetch_assoc()) :
        $total2 = $row2['total_bed_avail'];
    endwhile;

    if ($total1 == 0) {
        header("Location: renter.php?error=Room is full");
        exit();
    } else {
        if ($currentRoom != $room && $currentRoom != 0 && $room != 0) {
            $checkf = $total1 - 1;
            $checkg = $total2 + 1;
            $conn->query("UPDATE `rooms` SET `total_bed_avail`= $checkg WHERE `room_id` = $currentRoom ");
            $conn->query("UPDATE rooms SET total_bed_avail = $checkf WHERE room_id = $room ");
        }
        $conn->query("UPDATE `renters` SET 
    `firstname`='$fname',`middlename`='$mname',`lastname`='$lname',`gender`='$gender',
    `email`='$email',`address`='$address',`contact`='$phone' WHERE id = '$id'");

    $conn->query("UPDATE `renters_info`
    SET 
        `room_id`='$room',
        `date_in`='$date'
    WHERE id = '$id';
    ");
    }
  

    header("location: renter.php?edit=success");  $conn->close();
    exit();
} else {
    header("location: index.php");
    exit();
}
