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

    $name = validate($_GET['renter']);
    $invoice = validate($_GET['invoice']);
    $amount = validate($_GET['amount']);
    $date = date('Y-m-d H:i:s');


    $stmt = $conn->prepare("INSERT INTO payments (`renter_id`, `amount`, `invoice`, `date_created`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $name, $amount, $invoice, $date);
    $stmt->execute();


    if ($stmt->affected_rows > 0) {

        header("location: payments_renter.php?success=Insertion Success");
    } else {
        header("location: payments_renter.php?error=Insertion Failed");
        exit();
    }
    $stmt->close();
    $conn->close();
} else {
    header("location: payments_renter.php?error=No Payment.php");
    exit();
}
