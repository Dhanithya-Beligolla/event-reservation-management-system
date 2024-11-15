<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.html");
    exit();
}

include 'php/db.php';

if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];

    $sql = "DELETE FROM events WHERE id='$event_id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: view-events.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Event ID is missing.";
}

$conn->close();
?>
