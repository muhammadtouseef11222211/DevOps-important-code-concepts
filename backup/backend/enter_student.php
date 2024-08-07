<?php
include 'db_connect.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $rollnumber = $_POST['rollnumber'];

    // Check if rollnumber already exists
    $check_query = "SELECT * FROM students WHERE rollnumber = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("s", $rollnumber);
    $check_stmt->execute();
    $check_stmt->store_result();
    
    if ($check_stmt->num_rows > 0) {
        // Rollnumber already exists
        echo "Error: Rollnumber already exists.";
    } else {
        // Rollnumber does not exist, proceed with insertion
        $insert_query = "INSERT INTO students (name, class, rollnumber) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("sss", $name, $class, $rollnumber);
        
        if ($insert_stmt->execute()) {
            echo "Student data inserted successfully.";
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
        
        $insert_stmt->close();
    }

    $check_stmt->close();
    $conn->close();
}
?>
