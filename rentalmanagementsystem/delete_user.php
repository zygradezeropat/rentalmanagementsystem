
<?php

include 'connect.php';
session_start();
if (isset($_POST['deleteRenter'])) {

    $del = $_POST['delete_id'];
    $room = $_POST['room_num'];

    $lol = $conn->query("DELETE FROM renters WHERE id = '$del'");
    $sql = $conn->query("DELETE FROM user WHERE id = '$del'");
    $conn->query("DELETE FROM renters_info WHERE id = '$del'");

    $check = mysqli_query($conn, "SELECT * FROM rooms WHERE room_num = '$room'");
    while ($row = $check->fetch_assoc()) :
        $total = $row['total_bed_avail'];
        $checkf = $total + 1;
    endwhile;
    if ($checkf != 4) {
        $update = $conn->query("UPDATE rooms SET total_bed_avail = '$checkf' WHERE room_num = '$room'");
    }

    if ($sql->num_rows > 0) {
        header("Location: user.php?delete=success");
    } else {

        header("Location: user.php?delete=success");
    }
} else {
    header("location: user.php");
    exit();
}
$conn->close();
