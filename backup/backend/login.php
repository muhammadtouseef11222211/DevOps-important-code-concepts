<?php
session_start(); // Ensure session is started at the very beginning

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, password, type FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id, $hashed_password, $type);
    $stmt->fetch();

     if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
    //     // Login successful, store user data in session
         $_SESSION['id'] = $user_id;
         $_SESSION['username'] = $username;
         $_SESSION['type'] = $type;

         echo "User Type: " . $type . "<br>";
         echo "Username: " . $username . "<br>";

         // Determine redirect based on user type
         switch ($type) {
             case 'teacher':
                 header("Location: ../frontend/teacher.php");
                 exit(); // Ensure script stops execution after redirection
                 break;
             case 'student':
                 header("Location: ../frontend/student.php");
                 exit(); // Ensure script stops execution after redirection
                 break;
             case 'admin':
                 header("Location: ../frontend/admin.php");
                 exit(); // Ensure script stops execution after redirection
                 break;
             default:
                 echo "Unknown user type.";
                 exit(); // Ensure script stops execution after outputting message
                 break;
         }
     } else {
         // Login failed, redirect back to login page with error message
         header("Location: ../frontend/login.php?error=Invalid credentials");
         exit(); // Ensure script stops execution after redirection
     }

    $stmt->close();
    $conn->close();
}
?>