<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['booking_id'];

    $sql = "DELETE FROM bookings WHERE id='$booking_id' AND user_id='{$_SESSION['user_id']}'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../my-bookings.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
