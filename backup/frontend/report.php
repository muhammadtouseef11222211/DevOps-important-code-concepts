<?php
include "../backend/db_connect.php";

$classQuery = "SELECT DISTINCT class FROM students";
$classResult = mysqli_query($conn, $classQuery);

$rollNumberQuery = "SELECT DISTINCT rollnumber, name FROM students";
$rollNumberResult = mysqli_query($conn, $rollNumberQuery);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedClass = $_POST['class'];
    $selectedRollNumber = $_POST['rollnumber'];
    $selectedMonth = $_POST['month'];
    $selectedYear = $_POST['year'];

    $attendanceQuery = "SELECT 
        attendance.rollnumber, 
        attendance.class, 
        attendance.attendance_date, 
        attendance.present, 
        attendance.leave_status, 
        attendance.subject, 
        students.name 
    FROM 
        attendance 
    INNER JOIN 
        students 
    ON 
        attendance.rollnumber = students.rollnumber
    WHERE 1=1";

    if (!empty($selectedClass)) {
        $attendanceQuery .= " AND attendance.class = '$selectedClass'";
    }

    if (!empty($selectedRollNumber)) {
        $attendanceQuery .= " AND attendance.rollnumber = '$selectedRollNumber'";
    }

    if (!empty($selectedMonth)) {
        $attendanceQuery .= " AND MONTH(attendance.attendance_date) = '$selectedMonth'";
    }

    if (!empty($selectedYear)) {
        $attendanceQuery .= " AND YEAR(attendance.attendance_date) = '$selectedYear'";
    }

    $attendanceResult = mysqli_query($conn, $attendanceQuery);
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group select,
        .form-group input {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .table-container {
            margin-top: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .table th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>
<body class="bg-gray-100">
    <header>
        <!-- <?php include "nav_admins.php"; ?> -->
    </header>

    <main class="container mx-auto px-4 py-8" style="margin-top: 50px;">
        <div class="form-container">
            <form id="filterForm" method="post" action="">
                <div class="form-group">
                    <label for="class">Select Class:</label>
                    <select id="class" name="class" class="select2">
                        <option value="">Select a class</option>
                        <?php
                        if ($classResult->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($classResult)) {
                                echo "<option value='" . $row['class'] . "'>" . $row['class'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="rollnumber">Select Roll Number:</label>
                    <select id="rollnumber" name="rollnumber" class="select2">
                        <option value="">Select a roll number</option>
                        <?php
                        if ($rollNumberResult->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($rollNumberResult)) {
                                echo "<option value='" . $row['rollnumber'] . "'>" . $row['rollnumber'] . " (" . $row['name'] . ")</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="month">Select Month:</label>
                    <select id="month" name="month" class="select2">
                        <option value="">Select a month</option>
                        <?php
                        for ($m = 1; $m <= 12; $m++) {
                            $month = str_pad($m, 2, "0", STR_PAD_LEFT);
                            echo "<option value='$month'>$month</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="year">Select Year:</label>
                    <select id="year" name="year" class="select2">
                        <option value="">Select a year</option>
                        <?php
                        $currentYear = date("Y");
                        for ($y = $currentYear; $y >= 2000; $y--) {
                            echo "<option value='$y'>$y</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Fetch Data</button>
            </form>
        </div>
        <div class="table-container">
            <?php if (isset($attendanceResult) && $attendanceResult->num_rows > 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Roll Number</th>
                            <th>Class</th>
                            <th>Date</th>
                            <th>Present</th>
                            <th>Leave Status</th>
                            <th>Subject</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($attendanceResult)): ?>
                            <tr>
                                <td><?php echo $row['rollnumber']; ?></td>
                                <td><?php echo $row['class']; ?></td>
                                <td><?php echo $row['attendance_date']; ?></td>
                                <td><?php echo $row['present']; ?></td>
                                <td><?php echo $row['leave_status']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php elseif (isset($attendanceResult)): ?>
                <p>No data found for the selected criteria.</p>
            <?php endif; ?>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</body>
</html>
