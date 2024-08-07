<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $type = $_POST['type'];
    $class = $_POST['class'] ?? null;
    $subject = $_POST['subject'] ?? null; // Added to capture subject input

    $sql = "INSERT INTO users (username, password, type, class, subject) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $password, $type, $class, $subject);

    if ($stmt->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
