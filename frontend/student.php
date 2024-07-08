<?php
session_start();

// Redirect to login page if session variables are not set
if (!isset($_SESSION['username']) || !isset($_SESSION['type']) || $_SESSION['type'] !== 'student') {
    header("Location: login.php");
    exit();
}

// Set session variables if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['rollnumber'])) {
        $_SESSION['rollnumber'] = $_POST['rollnumber'];
    }
    if (isset($_POST['attendance_date'])) {
        $_SESSION['attendance_date'] = $_POST['attendance_date'];
    }
}

// Use the stored roll number and date session variables
$rollnumber = isset($_SESSION['rollnumber']) ? $_SESSION['rollnumber'] : '';
$attendance_date = isset($_SESSION['attendance_date']) ? $_SESSION['attendance_date'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">
    <header>
        <?php include "nav_student.php"; ?>
    </header>

    <main class="container mx-auto px-4 py-8" style="margin-top: 50px;">

        <!-- Roll Number Input Form -->
        <form method="POST" action="" class="mb-4">
            <label for="rollnumber" class="block text-gray-700 text-sm font-bold mb-2">Enter Roll Number:</label>
            <input type="text" id="rollnumber" name="rollnumber" class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" required>
            
            <label for="attendance_date" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Enter Date (YYYY-MM-DD):</label>
            <input type="date" id="attendance_date" name="attendance_date" class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" required>

            <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded shadow">Submit</button>
        </form>

        <!-- Student Attendance Table -->
        <div id="attendanceTable">
            <?php
            // Fetch and display attendance data based on rollnumber and attendance_date session variables
            if ($rollnumber && $attendance_date) {
                include '../backend/db_connect.php';
                $sql = "SELECT rollnumber, attendance_date, present, leave_status, class, subject FROM attendance WHERE rollnumber = ? AND attendance_date = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $rollnumber, $attendance_date);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    echo "<table border='1' class='min-w-full bg-white'>";
                    echo "<thead><tr><th>Roll Number</th><th>Attendance Date</th><th>Present</th><th>Leave Status</th><th>Class</th><th>Subject</th></tr></thead>";
                    echo "<tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='border px-4 py-2'>" . $row['rollnumber'] . "</td>";
                        echo "<td class='border px-4 py-2'>" . $row['attendance_date'] . "</td>";
                        echo "<td class='border px-4 py-2'>" . $row['present'] . "</td>";
                        echo "<td class='border px-4 py-2'>" . $row['leave_status'] . "</td>";
                        echo "<td class='border px-4 py-2'>" . $row['class'] . "</td>";
                        echo "<td class='border px-4 py-2'>" . $row['subject'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No records found.";
                }

                $stmt->close();
                $conn->close();
            }
            ?>
        </div>
    </main>
</body>
</html>
