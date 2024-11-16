<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="homepage-container">
        <h1>Welcome to Event Management System</h1>
        <div class="login-cards">
            <!-- Login as Admin Card -->
            <div class="login-card">
                <div class="card-icon">
                    <img src="icons/admin-icon.png" alt="Admin Icon" class="icon">
                </div>
                <h2>Login as Admin</h2>
                <p>Manage events, users, and bookings.</p>
                <a href="admin-login-page.php" class="btn">Admin Login</a>
            </div>

            <!-- Login as Customer Card -->
            <div class="login-card">
                <div class="card-icon">
                    <img src="icons/customer-icon.png" alt="Customer Icon" class="icon">
                </div>
                <h2>Login as Customer</h2>
                <p>Book events and view your bookings.</p>
                <a href="login-page.php" class="btn">Customer Login</a>
            </div>
        </div>
    </div>
</body>
</html>
