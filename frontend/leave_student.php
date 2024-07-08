<?php
session_start();

// Redirect to login page if session variables are not set
if (!isset($_SESSION['username']) || !isset($_SESSION['type']) || $_SESSION['type'] !== 'student') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">
    <header>
        <?php include "nav_student.php"; ?>
    </header>

    <main class="container mx-auto px-4 py-8" style="margin-top: 50px;">

        <!-- Leave Request Form -->
        <form method="POST" action="../backend/leave_request.php" class="mb-4">
            <label for="rollnumber" class="block text-gray-700 text-sm font-bold mb-2">Roll Number:</label>
            <input type="text" id="rollnumber" name="rollnumber" class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" required>
            
            <label for="attendance_date" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Date (YYYY-MM-DD):</label>
            <input type="date" id="attendance_date" name="attendance_date" class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" required>
            
            <label for="leave_status" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Leave Status:</label>
            <select id="leave_status" name="leave_status" class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" required>
                <option value="pending">Pending</option>
            </select>
            
            <label for="class" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Class:</label>
            <input type="text" id="class" name="class" class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" required>
            
            <label for="subject" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Subject:</label>
            <input type="text" id="subject" name="subject" class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" required>

            <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded shadow">Submit Leave Request</button>
        </form>
    </main>
</body>
</html>
