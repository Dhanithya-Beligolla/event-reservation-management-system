<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="container">
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="my-bookings.php">View My Bookings</a></li>
                <li><a href="php/logout.php">Logout</a></li>
            </ul>
        </nav>
        <h1>My Bookings</h1>
        <table>
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Venue</th>
                    <th>Mobile</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'php/db.php';
                session_start();
                $user_id = $_SESSION['user_id'];
                $sql = "SELECT bookings.id AS booking_id, events.name, events.date, events.venue, bookings.mobilenumber 
                        FROM bookings 
                        JOIN events ON bookings.event_id = events.id 
                        WHERE bookings.user_id = '$user_id'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>{$row['name']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['venue']}</td>
                            <td>{$row['mobilenumber']}</td>
                            <td>
                                <form action='update-booking-page.php' method='GET' style='display:inline;'>
                                    <input type='hidden' name='booking_id' value='{$row['booking_id']}'>
                                    <button type='submit'>Update</button>
                                </form>
                                <form action='php/delete-booking.php' method='POST' style='display:inline;'>
                                    <input type='hidden' name='booking_id' value='{$row['booking_id']}'>
                                    <button type='submit'>Delete</button>
                                </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No bookings found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
