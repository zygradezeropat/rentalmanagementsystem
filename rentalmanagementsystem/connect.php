<?php

$conn = mysqli_connect('localhost', 'root', '', 'room_rental_management');
if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}
