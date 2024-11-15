<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobilenumber = $_POST['mobilenumber'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (fullname, email, mobilenumber, password) VALUES ('$fullname', '$email', '$mobilenumber', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../login-page.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
