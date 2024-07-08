
<?php
// Include your database connection file
include 'db_connect.php';

// Check if class parameter is set
if (isset($_GET['class'])) {
    $selectedClass = $_GET['class'];

    // SQL query to fetch students for the selected class
    $sql = "SELECT * FROM students WHERE class = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedClass);
    $stmt->execute();
    $result = $stmt->get_result();

    // Build the table
    if ($result->num_rows > 0) {
        echo '<table class="min-w-full bg-white border-collapse border border-gray-300">';
        echo '<thead>';
        echo '<tr>';
        echo '<th class="border border-gray-300 px-4 py-2">Student Name</th>';
        echo '<th class="border border-gray-300 px-4 py-2">Class</th>';
        echo '<th class="border border-gray-300 px-4 py-2">Roll Number</th>';
        echo '<th class="border border-gray-300 px-4 py-2">Current Date</th>';
        echo '<th class="border border-gray-300 px-4 py-2">Present</th>';

        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td class="border border-gray-300 px-4 py-2">' . $row['name'] . '</td>';
            echo '<td class="border border-gray-300 px-4 py-2">' . $row['class'] . '</td>';
            echo '<td class="border border-gray-300 px-4 py-2">' . $row['rollnumber'] . '</td>';

            echo '<td class="border border-gray-300 px-4 py-2">' . date('Y-m-d') . '</td>';
            echo '<td class="border border-gray-300 px-4 py-2">';
            echo '<input type="radio" id="present_yes_' . $row['rollnumber'] . '" name="attendance[' . $row['rollnumber'] . ']" value="yes" onchange="updateAttendance(\'' . $row['rollnumber'] . '\', \'yes\')" class="form-radio h-5 w-5 text-blue-600">';
            echo '<label for="present_yes_' . $row['rollnumber'] . '" class="ml-2 text-gray-700">Yes</label>';
            echo '<input type="radio" id="present_no_' . $row['rollnumber'] . '" name="attendance[' . $row['rollnumber'] . ']" value="no" onchange="updateAttendance(\'' . $row['rollnumber'] . '\', \'no\')" class="form-radio h-5 w-5 text-red-600 ml-4">';
            echo '<label for="present_no_' . $row['rollnumber'] . '" class="ml-2 text-gray-700">No</label>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo 'No students found for this class.';
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Class parameter not set.';
}
?>

