
<?php
include 'connect.php';
session_start();
if (isset($_POST['deleteRenter'])) {

    $del = $_POST['delete_id'];
    $room = $_POST['room_num'];

    $renterRow = $conn->query("SELECT * FROM renters WHERE id = $del");

    $row2 = $renterRow->fetch_assoc();

    $firstname = $row2['firstname'];
    $middlename = $row2['middlename'];
    $lastname = $row2['lastname'];
    $id = $row2['id'];

    $currentDate = date('Y-m-d');



    $conn->query("INSERT INTO `past_renters`(`id`, `firstname`, `middlename`, `lastname`, 
    `last_time_in`) VALUES ('$del','$firstname','$middlename','$lastname', '$currentDate') ");

    $sql = $conn->query("DELETE FROM user WHERE id = '$del'");
    $conn->query("DELETE FROM renters_info WHERE id = '$del'");


    $lol = $conn->query("DELETE FROM renters WHERE id = '$del'");


    $check = mysqli_query($conn, "SELECT * FROM rooms WHERE room_num = '$room'");
    while ($row = $check->fetch_assoc()) :
        $total = $row['total_bed_avail'];
        $checkf = $total + 1;
    endwhile;

    if ($row['total_bed_avail'] != 4) {
        $update = $conn->query("UPDATE rooms SET total_bed_avail = '$checkf' WHERE room_num = '$room'");
    }


    if ($sql->num_rows > 0) {
        header("Location: renter.php?delete=success");
    } else {

        header("Location: renter.php?delete=success");
    }
} else {
    header("location: renter.php");
    exit();
}
$conn->close();
