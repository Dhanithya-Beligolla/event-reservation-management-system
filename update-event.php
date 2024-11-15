<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.html");
    exit();
}

include 'php/db.php';

if (!isset($_GET['event_id'])) {
    echo "Event ID is missing.";
    exit();
}

$event_id = $_GET['event_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $venue = $_POST['venue'];

    $sql = "UPDATE events SET name='$name', date='$date', venue='$venue' WHERE id='$event_id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: view-events.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM events WHERE id='$event_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $event = $result->fetch_assoc();
} else {
    echo "Event not found.";
    exit();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Update Event</h1>
        <form action="update-event.php?event_id=<?php echo $event_id; ?>" method="POST">
            <label for="name">Event Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($event['name']); ?>" required>

            <label for="date">Event Date:</label>
            <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($event['date']); ?>" required>

            <label for="venue">Venue:</label>
            <input type="text" id="venue" name="venue" value="<?php echo htmlspecialchars($event['venue']); ?>" required>

            <button type="submit">Update Event</button>
        </form>
    </div>
</body>
</html>
