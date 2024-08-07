<?php
include "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $type = $_POST['type'];

    if ($stmt = $conn->prepare("DELETE FROM users WHERE username=? AND type=?")) {
        $stmt->bind_param("ss", $username, $type);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "User deleted successfully.";
        } else {
            echo "User not found.";
        }

        $stmt->close();
    } else {
        echo "Error preparing statement.";
    }

    mysqli_close($conn);
} else {
    echo "Invalid request method.";
}
?>
