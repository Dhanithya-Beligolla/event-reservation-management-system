<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    // Redirect to login page if the user is not logged in
    header("Location: index.html");
    exit;
}

// Check if event ID is provided in the URL
if (!isset($_GET['event_id'])) {
    echo "Invalid request. Event ID is missing.";
    exit;
}

$event_id = $_GET['event_id'];
include 'php/db.php';

// Retrieve the event details from the database
$sql = "SELECT * FROM events WHERE id = '$event_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $event = $result->fetch_assoc();
} else {
    echo "Event not found.";
    exit;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Event</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Book Event</h1>
        <form action="php/add-booking.php" method="POST">
            <label for="event-name">Event Name:</label>
            <input type="text" id="event-name" value="<?php echo htmlspecialchars($event['name']); ?>" readonly>

            <label for="event-date">Event Date:</label>
            <input type="text" id="event-date" value="<?php echo htmlspecialchars($event['date']); ?>" readonly>

            <label for="venue">Venue:</label>
            <input type="text" id="venue" value="<?php echo htmlspecialchars($event['venue']); ?>" readonly>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" readonly>

            <label for="mobilenumber">Mobile Number:</label>
            <input type="text" id="mobilenumber" name="mobilenumber" required>

            <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($event_id); ?>">
            <button type="submit">Book Event</button>
        </form>
    </div>
</body>
</html>
