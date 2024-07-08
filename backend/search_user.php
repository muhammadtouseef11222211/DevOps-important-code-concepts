<?php
include "../backend/db_connect.php";

$search = $_POST['search'];

$query = "SELECT username, type FROM users WHERE username LIKE '%$search%'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table class='table-auto w-full'>";
    echo "<thead><tr><th>Username</th><th>Type</th></tr></thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['username'] . "</td><td>" . $row['type'] . "</td></tr>";
    }
    echo "</tbody></table>";
} else {
    echo "No users found.";
}

mysqli_close($conn);
?>
