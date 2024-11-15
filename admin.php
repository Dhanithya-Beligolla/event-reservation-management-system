<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>All Bookings</h1>
        <table>
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Venue</th>
                    <th>Mobile</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'php/db.php';
                $sql = "SELECT users.fullname, users.email, events.name AS event_name, events.date, events.venue, bookings.mobilenumber 
                        FROM bookings 
                        JOIN users ON bookings.user_id = users.id 
                        JOIN events ON bookings.event_id = events.id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>{$row['fullname']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['event_name']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['venue']}</td>
                            <td>{$row['mobilenumber']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No bookings found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
