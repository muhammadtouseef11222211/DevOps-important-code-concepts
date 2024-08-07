<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollnumber = $_POST['rollnumber'];
    $attendance_date = $_POST['attendance_date'];
    $leave_status = $_POST['leave_status'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $present = 'no'; // Set default value for present when inserting

    echo "Roll Number: $rollnumber<br>";
    echo "Attendance Date: $attendance_date<br>";
    echo "Leave Status: $leave_status<br>";
    echo "Class: $class<br>";
    echo "Subject: $subject<br>";

    // Check if a record already exists for the given roll number, date, class, and subject
    $sql_check = "SELECT id FROM attendance WHERE rollnumber = ? AND attendance_date = ? AND class = ? AND subject = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("ssss", $rollnumber, $attendance_date, $class, $subject);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        // Record exists, update the leave status
        $stmt_check->bind_result($id);
        $stmt_check->fetch();
        $stmt_check->close();

        $sql_update = "UPDATE attendance SET leave_status = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ss", $leave_status, $id);
        if ($stmt_update->execute()) {
            echo "Leave status updated successfully.<br>";
        } else {
            echo "Failed to update leave status: " . $conn->error . "<br>";
        }

        $stmt_update->close();
    } else {
        // No record found, insert a new leave request
        $stmt_check->close();

        $sql_insert = "INSERT INTO attendance (rollnumber, attendance_date, present, leave_status, class, subject) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ssssss", $rollnumber, $attendance_date, $present, $leave_status, $class, $subject);
        if ($stmt_insert->execute()) {
            echo "Leave request submitted successfully.<br>";
        } else {
            echo "Failed to submit leave request: " . $conn->error . "<br>";
        }

        $stmt_insert->close();
    }
    echo "Leave Status to be inserted: $leave_status<br>";
    header("Location: ../frontend/student.php");

    $conn->close();

    // Redirect to a confirmation page or back to the form
    exit();
}
?>
