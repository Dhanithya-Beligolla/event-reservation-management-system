<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.html");
    exit();
}

include 'php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $venue = $_POST['venue'];

    $sql = "INSERT INTO events (name, date, venue) VALUES ('$name', '$date', '$venue')";
    if ($conn->query($sql) === TRUE) {
        header("Location: view-events.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Create Event</h1>
        <form action="create-event.php" method="POST">
            <label for="name">Event Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="date">Event Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="venue">Venue:</label>
            <input type="text" id="venue" name="venue" required>

            <button type="submit">Create Event</button>
        </form>
    </div>
</body>
</html>
