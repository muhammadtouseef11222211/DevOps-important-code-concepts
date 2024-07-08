<?php
session_start();

// Redirect to login page if session variables are not set
if (!isset($_SESSION['username']) || !isset($_SESSION['type']) || $_SESSION['type'] !== 'teacher') {
    header("Location: login.php");
    exit();
}

// Output username and class
//echo "Welcome, " . $_SESSION['username'] . "<br>";
//echo "Class: " . $_SESSION['class'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
    <!-- Include necessary styles and scripts -->
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">
    <header>
        <?php include "nav.php"; ?> <!-- Include your navigation file -->
    </header>

    <main class="container mx-auto px-4 py-8" style="margin-top: 50px;">

        <!-- Class Selection Dropdown -->
        <div class="mb-4">
            <label for="class" class="block text-gray-700 text-sm font-bold mb-2">Select Class:</label>
            <select id="class" name="class" class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" onchange="setSession('class', this.value); fetchStudents(this.value);">
                <option value="">Select a class</option>
                <?php
                // Fetch distinct classes from the database
                include '../backend/db_connect.php';
                $sql = "SELECT DISTINCT class FROM users";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['class'] . "'>" . $row['class'] . "</option>";
                    }
                }
                $conn->close();
                ?>
            </select>
        </div>

        <!-- Subject Selection Dropdown -->
        <div class="mb-4">
            <label for="subject" class="block text-gray-700 text-sm font-bold mb-2">Select Subject:</label>
            <select id="subject" name="subject" class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" onchange="setSession('subject', this.value)">
                <option value="">Select a subject</option>
                <?php
                // Fetch distinct subjects from the database
                include '../backend/db_connect.php';
                $sql = "SELECT DISTINCT subject FROM users";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['subject'] . "'>" . $row['subject'] . "</option>";
                    }
                }
                $conn->close();
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
            // Store in session via AJAX
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
            // AJAX request to fetch students for the selected class
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
            // AJAX request to update attendance
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    // Optional: Display success message or handle response
                    console.log('Attendance updated successfully');
                }
            };
            xhttp.open("POST", "../backend/add_attendance.php", true);
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

    <?php
    // Set session variables
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['class'])) {
            $_SESSION['class'] = $_POST['class'];
        }

        if (isset($_POST['subject'])) {
            $_SESSION['subject'] = $_POST['subject'];
        }
    }
    ?>

</body>

</html>
