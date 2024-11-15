<?php
include 'db.php';

$sql = "SELECT users.fullname, users.email, events.name AS event_name, events.date, events.venue, bookings.mobilenumber 
        FROM bookings 
        JOIN users ON bookings.user_id = users.id 
        JOIN events ON bookings.event_id = events.id";

$result = $conn->query($sql);

$adminData = [];
while ($row = $result->fetch_assoc()) {
    $adminData[] = $row;
}

header('Content-Type: application/json');
echo json_encode($adminData);

$conn->close();
?>
