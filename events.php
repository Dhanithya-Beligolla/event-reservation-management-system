<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="my-bookings.php">View My Bookings</a></li>
                <li><a href="php/logout.php">Logout</a></li>
            </ul>
        </nav>
    <div class="container">
        <h1>Available Events</h1>
        <div class="event-cards">
            <?php
            include 'php/db.php'; // Connect to the database

            $sql = "SELECT * FROM events"; // SQL query to fetch events
            $result = $conn->query($sql);

            // Check if there are results
            if ($result->num_rows > 0) {
                // Loop through each event and display as a card
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='event-card'>
                        <h2>" . htmlspecialchars($row['name']) . "</h2>
                        <p><strong>Date:</strong> " . htmlspecialchars($row['date']) . "</p>
                        <p><strong>Venue:</strong> " . htmlspecialchars($row['venue']) . "</p>
                        <a href='booking-form.php?event_id=" . htmlspecialchars($row['id']) . "' class='btn'>Book Now</a>
                    </div>
                    ";
                }
            } else {
                echo "<p>No events available at the moment.</p>";
            }

            $conn->close(); // Close the database connection
            ?>
        </div>
    </div>
</body>
</html>
