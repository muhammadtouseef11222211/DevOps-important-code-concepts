<?php


// Use the stored class and subject session variables
$class = $_SESSION['class'];
$subject = $_SESSION['subject'];

// Include your database connection file
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs (if needed, though you should use prepared statements)
    $rollnumber = $_POST['rollnumber'];
    $attendance_date = $_POST['attendance_date'];
    $present = $_POST['present'];

    // Check if attendance already exists for today and rollnumber
    $check_sql = "SELECT * FROM attendance WHERE rollnumber = ? AND attendance_date = ? AND subject = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("sss", $rollnumber, $attendance_date, $subject);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        // Attendance record already exists, update it
        $update_sql = "UPDATE attendance SET present = ?, class = ?, subject = ? WHERE rollnumber = ? AND attendance_date = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("sssss", $present, $class, $subject, $rollnumber, $attendance_date);
        if ($update_stmt->execute()) {
            echo "Attendance updated successfully.";
        } else {
            echo "Error updating attendance: " . $update_stmt->error;
        }
        $update_stmt->close();
    } else {
        // Attendance record doesn't exist, insert new record
        $insert_sql = "INSERT INTO attendance (rollnumber, attendance_date, present, class, subject) VALUES (?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sssss", $rollnumber, $attendance_date, $present, $class, $subject);
        if ($insert_stmt->execute()) {
            echo "Attendance added successfully.";
        } else {
            echo "Error adding attendance: " . $insert_stmt->error;
        }
        $insert_stmt->close();
    }

    $check_stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
  