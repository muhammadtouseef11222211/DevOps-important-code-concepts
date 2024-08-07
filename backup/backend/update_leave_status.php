<?php
include "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rollnumber = $_POST['rollnumber'];
    $attendance_date = $_POST['attendance_date'];
    $leave_status = $_POST['leave_status'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];

    $sql = "UPDATE attendance SET leave_status = ? WHERE rollnumber = ? AND attendance_date = ? AND class = ? AND subject = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $leave_status, $rollnumber, $attendance_date, $class, $subject);

    if ($stmt->execute()) {
        echo "Updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
