<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to handle update of leave status via AJAX
            $(document).on('click', '.updateButton', function(event) {
                event.preventDefault(); // Prevent default form submission

                // Serialize form data
                var formData = $(this).closest('form').serialize();

                // Send AJAX request to update leave status
                $.ajax({
                    type: 'POST',
                    url: '../backend/update_leave_status.php', // Backend script to handle update
                    data: formData,
                    success: function(response) {
                        // Show success message
                        alert(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</head>

<body class="bg-gray-100">
    <header>
        <?php include "nav.php"; ?>
    </header>

    <main class="container mx-auto px-4 py-8" style="margin-top: 50px;">

        <!-- Attendance Form -->
        <form method="POST" action="" class="mb-4">
            <label for="class" class="block text-gray-700 text-sm font-bold mb-2">Class:</label>
            <input type="text" id="class" name="class" class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" required>

            <label for="subject" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Subject:</label>
            <input type="text" id="subject" name="subject" class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" required>

            <label for="attendance_date" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Date (Optional):</label>
            <input type="date" id="attendance_date" name="attendance_date" class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full">

            <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded shadow">Submit</button>
        </form>

        <?php
        session_start();

        // Check if session variables are set and user is a teacher
        if (!isset($_SESSION['username']) || !isset($_SESSION['type']) || $_SESSION['type'] !== 'teacher') {
            header("Location: ../login.php");
            exit();
        }

        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $class = $_POST['class'];
            $subject = $_POST['subject'];
            $attendance_date = isset($_POST['attendance_date']) ? $_POST['attendance_date'] : null;

            // Fetch attendance data based on class and subject (and optionally by date)
            include '../backend/db_connect.php'; // Adjust path as per your directory structure

            if ($attendance_date) {
                $sql = "SELECT rollnumber, attendance_date, leave_status, class, subject FROM attendance WHERE class = ? AND subject = ? AND attendance_date = ? AND leave_status != 'no'";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $class, $subject, $attendance_date);
            } else {
                $sql = "SELECT rollnumber, attendance_date, leave_status, class, subject FROM attendance WHERE class = ? AND subject = ? AND leave_status != 'no'";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $class, $subject);
            }

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Display the attendance data in a table
                echo "<table border='1' class='min-w-full bg-white'>";
                echo "<thead><tr><th>Roll Number</th><th>Attendance Date</th><th>Leave Status</th><th>Class</th><th>Subject</th><th>Action</th></tr></thead>";
                echo "<tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='border px-4 py-2'>" . $row['rollnumber'] . "</td>";
                    echo "<td class='border px-4 py-2'>" . $row['attendance_date'] . "</td>";
                    echo "<td class='border px-4 py-2'>" . $row['leave_status'] . "</td>";
                    echo "<td class='border px-4 py-2'>" . $row['class'] . "</td>";
                    echo "<td class='border px-4 py-2'>" . $row['subject'] . "</td>";
                    echo "<td class='border px-4 py-2'>
                            <form class='updateForm'>
                                <input type='hidden' name='rollnumber' value='" . $row['rollnumber'] . "'>
                                <input type='hidden' name='attendance_date' value='" . $row['attendance_date'] . "'>
                                <input type='hidden' name='class' value='" . $row['class'] . "'>
                                <input type='hidden' name='subject' value='" . $row['subject'] . "'>
                                <select name='leave_status' class='px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline'>
                                    <option value='pending' " . ($row['leave_status'] === 'pending' ? 'selected' : '') . ">Pending</option>
                                    <option value='accepted' " . ($row['leave_status'] === 'accepted' ? 'selected' : '') . ">Accepted</option>
                                </select>
                                <button type='button' class='ml-2 updateButton px-4 py-2 bg-blue-500 text-white rounded shadow'>Update</button>
                            </form>
                        </td>";
                    echo "</tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "No records found.";
            }

            $stmt->close();
            $conn->close();
        } else {
            header("Location: ../login.php"); // Redirect if accessed directly without POST data
            exit();
        }
        ?>
        <!-- Attendance Table will be displayed here -->
        <div id="attendanceTable"></div>

    </main>

</body>

</html>
