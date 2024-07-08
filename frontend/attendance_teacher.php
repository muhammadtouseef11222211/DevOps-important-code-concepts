<?php
session_start();
include "../backend/db_connect.php";

// Handle AJAX requests for setting session variables and updating attendance
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['class'])) {
        $_SESSION['class'] = $_POST['class'];
        exit(); // Exit after setting the class to avoid further processing
    }

    if (isset($_POST['subject'])) {
        $_SESSION['subject'] = $_POST['subject'];
        exit(); // Exit after setting the subject to avoid further processing
    }

    if (isset($_POST['rollnumber']) && isset($_POST['attendance_date']) && isset($_POST['present'])) {
        $rollnumber = $_POST['rollnumber'];
        $attendance_date = $_POST['attendance_date'];
        $present = $_POST['present'];
        $class = $_SESSION['class'];
        $subject = $_SESSION['subject'];

        // Check if the attendance record already exists
        $checkQuery = "SELECT * FROM attendance WHERE rollnumber = '$rollnumber' AND attendance_date = '$attendance_date' AND subject = '$subject' AND class = '$class'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Update existing attendance record
            $updateQuery = "UPDATE attendance SET present = '$present' WHERE rollnumber = '$rollnumber' AND attendance_date = '$attendance_date' AND subject = '$subject' AND class = '$class'";
            mysqli_query($conn, $updateQuery);
        } else {
            // Insert new attendance record
            $insertQuery = "INSERT INTO attendance (rollnumber, attendance_date, present, class, subject) VALUES ('$rollnumber', '$attendance_date', '$present', '$class', '$subject')";
            mysqli_query($conn, $insertQuery);
        }
        exit();
    }
}

mysqli_close($conn);
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
        <?php include "nav.php"; ?>
    </header>
    <main class="container mx-auto px-4 py-8" style="margin-top: 50px;">
        <!-- Class Input -->
        <div class="mb-4">
            <label for="class" class="block text-gray-700 text-sm font-bold mb-2">Enter Class:</label>
            <input type="text" id="class" name="class" class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" onblur="setSession('class', this.value); fetchStudents(this.value);">
        </div>
        <!-- Subject Selection Dropdown -->
        <div class="mb-4">
            <label for="subject" class="block text-gray-700 text-sm font-bold mb-2">Select Subject:</label>
            <select id="subject" name="subject" class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" onchange="setSession('subject', this.value)">
                <option value="">Select a subject</option>
                <?php
                $subjects = ["Mathematics", "Physics", "Chemistry", "Biology", "English", "History", "Geography", "Computer Science", "Economics", "Political Science", "Sociology", "Psychology", "Philosophy", "Physical Education", "Art", "Music", "Business Studies", "Accountancy", "Environmental Science", "Information Technology"];
                foreach ($subjects as $subject) {
                    echo "<option value='$subject'>$subject</option>";
                }
                ?>
            </select>
        </div>
        <!-- Student Attendance Table -->
        <div id="attendanceTable"></div>
    </main>

    <script>
        // Function to set session variable
        function setSession(key, value) {
            if (value === "") {
                return;
            }
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "", true); // Same page
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(key + "=" + value);
        }

        // Function to fetch students for selected class
        function fetchStudents(selectedClass) {
            if (selectedClass === "") {
                document.getElementById('attendanceTable').innerHTML = "";
                return;
            }
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById('attendanceTable').innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../backend/fetch_students.php?class=" + selectedClass, true);
            xhttp.send();
        }

        // Function to handle radio button change and update attendance via AJAX
        function updateAttendance(rollnumber, present) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    console.log('Attendance updated successfully');
                }
            };
            xhttp.open("POST", "", true); // Same page
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("rollnumber=" + rollnumber + "&attendance_date=" + getCurrentDate() + "&present=" + present);
        }

        // Function to get current date in YYYY-MM-DD format
        function getCurrentDate() {
            var today = new Date();
            var year = today.getFullYear();
            var month = String(today.getMonth() + 1).padStart(2, '0');
            var day = String(today.getDate()).padStart(2, '0');
            return year + '-' + month + '-' + day;
        }
    </script>
</body>
</html>
