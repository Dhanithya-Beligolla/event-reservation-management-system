<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.html");
    exit();
}
?>
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
        <h1>Welcome, <?php echo $_SESSION['admin_username']; ?>!</h1>
        <nav>
            <ul>
                <li><a href="view-users.php">View All Users</a></li>
                <li><a href="view-events.php">View Events</a></li>
                <li><a href="create-event.php">Create Event</a></li>
                <li><a href="view-bookings.php">View All Bookings</a></li>
                <li><a href="php/admin-logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>
