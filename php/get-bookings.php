<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT bookings.id, events.name, events.date, events.venue, bookings.mobilenumber 
        FROM bookings 
        JOIN events ON bookings.event_id = events.id 
        WHERE bookings.user_id = '$user_id'";

$result = $conn->query($sql);

$bookings = [];
while ($row = $result->fetch_assoc()) {
    $bookings[] = $row;
}

header('Content-Type: application/json');
echo json_encode($bookings);

$conn->close();
?>
