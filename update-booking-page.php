<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in. Please log in to edit your booking.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Booking</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Update Booking</h1>
        <?php
        // Check if the booking ID is set in the query string
        if (isset($_GET['booking_id'])) {
            $booking_id = $_GET['booking_id'];
            include 'php/db.php'; // Include the database connection file

            // Fetch the booking details based on the booking ID
            $sql = "SELECT bookings.mobilenumber, events.name, events.date, events.venue 
                    FROM bookings 
                    JOIN events ON bookings.event_id = events.id 
                    WHERE bookings.id = '$booking_id' AND bookings.user_id = '{$_SESSION['user_id']}'";
            $result = $conn->query($sql);

            // Check if the booking exists
            if ($result && $result->num_rows > 0) {
                $booking = $result->fetch_assoc();
                ?>

                <!-- Display the booking update form -->
                <form action="php/update-booking.php" method="POST">
                    <label for="event-name">Event Name:</label>
                    <input type="text" id="event-name" value="<?php echo htmlspecialchars($booking['name']); ?>" readonly>

                    <label for="event-date">Event Date:</label>
                    <input type="text" id="event-date" value="<?php echo htmlspecialchars($booking['date']); ?>" readonly>

                    <label for="venue">Venue:</label>
                    <input type="text" id="venue" value="<?php echo htmlspecialchars($booking['venue']); ?>" readonly>

                    <label for="mobilenumber">Mobile Number:</label>
                    <input type="text" id="mobilenumber" name="mobilenumber" value="<?php echo htmlspecialchars($booking['mobilenumber']); ?>" required>

                    <input type="hidden" name="booking_id" value="<?php echo htmlspecialchars($booking_id); ?>">
                    <button type="submit">Update Booking</button>
                </form>

                <?php
            } else {
                echo "<p>Booking not found or you do not have permission to edit this booking.</p>";
            }

            $conn->close(); // Close the database connection
        } else {
            echo "<p>Invalid request. Booking ID is missing.</p>";
        }
        ?>
    </div>
</body>
</html>
