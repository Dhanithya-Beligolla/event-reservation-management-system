<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Your Dashboard</h1>
        <p>Welcome, <strong><?php session_start(); echo $_SESSION['fullname']; ?></strong>!</p>
        <nav>
            <ul>
                <li><a href="events.php">Event Page</a></li>
                <li><a href="my-bookings.php">View My Bookings</a></li>
                <li><a href="php/logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>
