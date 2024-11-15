<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_id = $_SESSION['user_id'];
    $event_id = $_POST['event_id'];
    $mobilenumber = $_POST['mobilenumber'];

    // Insert booking into the database
    $sql = "INSERT INTO bookings (user_id, event_id, mobilenumber, booking_date) VALUES ('$user_id', '$event_id', '$mobilenumber', NOW())";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../my-bookings.php"); // Redirect to My Bookings page on success
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
