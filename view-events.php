<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.html");
    exit();
}

include 'php/db.php';

$sql = "SELECT * FROM events";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Events</title>
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
        <h1>Events</h1>
        <a href="create-event.php" class="btn">Create New Event</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Venue</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['date']); ?></td>
                    <td><?php echo htmlspecialchars($row['venue']); ?></td>
                    <td>
                        <a href="update-event.php?event_id=<?php echo $row['id']; ?>" class="btn">Edit</a>
                        <a href="delete-event.php?event_id=<?php echo $row['id']; ?>" class="btn" onclick="return confirm('Are you sure you want to delete this event?');">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>
