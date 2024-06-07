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

    $invoice = validate($_GET['rein']);
    $paymentEdit = $_GET['paymentEdit'];
    $id = validate($_GET['renter_id']);

 
    $stmt = $conn->prepare("UPDATE payments SET amount = ? WHERE invoice = ?");
    $stmt->bind_param("di", $paymentEdit, $invoice);
    $stmt->execute();
    $stmt->close();

    $mix = $conn->query("SELECT *
    FROM payments
    INNER JOIN renters_info ON payments.renter_id = renters_info.id
    INNER JOIN rooms ON renters_info.room_id = rooms.room_id WHERE renter_id = '$id';
    ");

    if ($mix->num_rows > 0) :
        while ($row = $mix->fetch_assoc()) :
            $currentBalance = $row['balance'];
            $Balance = $currentBalance - ($row['amount']);
        endwhile;
    endif;

    $conn->query("UPDATE renters SET balance = $Balance");


    header("location: payments_renter.php?edit=success");
    exit();
    
} else {
    header("location: payments_renter.php?edit=unsuccessful");
    exit();
}


?>
