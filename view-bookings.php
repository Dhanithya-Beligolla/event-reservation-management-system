<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.html");
    exit();
}

include 'php/db.php'; // Include the database connection

// Fetch all bookings along with related user and event details
$sql = "SELECT bookings.id AS booking_id, bookings.booking_date, bookings.mobilenumber,
               users.fullname AS customer_name, users.email AS customer_email,
               events.name AS event_name, events.date AS event_date, events.venue AS event_venue
        FROM bookings
        JOIN users ON bookings.user_id = users.id
        JOIN events ON bookings.event_id = events.id
        ORDER BY bookings.booking_date DESC";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Bookings</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>


    <div class="container">
        <nav>
            <ul>
                <li><a href="admin-dashboard.php">Dashboard</a></li>
                <li><a href="view-users.php">View All Users</a></li>
                <li><a href="view-events.php">Manage Events</a></li>
                <li><a href="view-bookings.php">View All Bookings</a></li>
                <li><a href="php/admin-logout.php">Logout</a></li>
            </ul>
        </nav>
        <h1>All Bookings</h1>
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Booking Date</th>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Venue</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any bookings to display
                if ($result->num_rows > 0) {
                    // Loop through each booking and display it in the table
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['booking_id']) . "</td>
                                <td>" . htmlspecialchars($row['booking_date']) . "</td>
                                <td>" . htmlspecialchars($row['event_name']) . "</td>
                                <td>" . htmlspecialchars($row['event_date']) . "</td>
                                <td>" . htmlspecialchars($row['event_venue']) . "</td>
                                <td>" . htmlspecialchars($row['customer_name']) . "</td>
                                <td>" . htmlspecialchars($row['customer_email']) . "</td>
                                <td>" . htmlspecialchars($row['mobilenumber']) . "</td>
                              </tr>";
                    }
                } else {
                    // Display a message if there are no bookings
                    echo "<tr><td colspan='8'>No bookings found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>
