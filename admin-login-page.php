<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="home-button">
        <a href="index.php">
            <span class="home-icon">&#8962;</span> Home
        </a>
    </div>
    <div class="container">
        <h1>Admin Login</h1>
        <form action="php/admin-login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login as Admin</button>
        </form>
        <p>Don't have an account? <a href="admin-register-page.php">Register here</a>.</p>
    </div>
</body>
</html>
