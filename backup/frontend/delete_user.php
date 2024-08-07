<?php
session_start();

// Redirect to login page if session variables are not set
if ($_SESSION['type'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include "../backend/db_connect.php";

// Handle AJAX requests for searching users and deleting users
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle search request
    if (isset($_POST['search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['search']);

        $query = "SELECT username, type FROM users WHERE username='$search'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table-auto w-full'>";
            echo "<thead><tr><th>Username</th><th>Type</th><th>Action</th></tr></thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . htmlspecialchars($row['username']) . "</td><td>" . htmlspecialchars($row['type']) . "</td>";
                echo "<td><button class='bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline' onclick=\"deleteUser('" . htmlspecialchars($row['username']) . "')\">Delete</button></td></tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "No users found.";
        }

        exit();
    }

    // Handle delete request
    if (isset($_POST['delete'])) {
        $username = mysqli_real_escape_string($conn, $_POST['delete']);

        $deleteQuery = "DELETE FROM users WHERE username='$username'";
        if (mysqli_query($conn, $deleteQuery)) {
            echo "User deleted successfully.";
        } else {
            echo "Error deleting user: " . mysqli_error($conn);
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Management</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">

    <style>
        /* Custom inline styles */

        /* Center align the main content */
        #main {
            max-width: 800px;
            margin: 0 auto;
            padding: 1rem;
        }

        /* Styling for the analytics section */
        .analytics-section {
            background-color: #4a5568;
            padding-top: 0.75rem;
        }

        .analytics-header {
            border-top-left-radius: 1.5rem;
            background-image: linear-gradient(to right, #1a202c, #2d3748);
            padding: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            font-size: 1.5rem;
            color: #ffffff;
        }
    </style>
</head>

<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">

    <header>
        <?php include "nav_admin.php" ?>

        <section style="margin-left: 5%; width: 100%;">
            <div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5" style="width: 100%;">

                <div class="analytics-section">
                    <div class="analytics-header">
                        <h1 class="font-bold pl-2">User Management</h1>
                    </div>
                </div>

                <!-- User Search and Management Form -->
                <div style="text-align: center; margin-top: 1.25rem;">
                    <h2 class="text-xl font-semibold mb-2">Manage Users</h2>
                    <form id="userForm" style="display: inline-block; width: 100%; max-width: 400px;">
                        <div class="mb-4">
                            <label for="search" class="block text-gray-700 text-sm font-bold mb-2">Search User:</label>
                            <input type="text" id="search" name="search" class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full" placeholder="Type username to search">
                        </div>
                        <button type="button"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            onclick="searchUser()">Search</button>
                    </form>
                </div>
                <!-- /User Search and Management Form -->

                <!-- Result Display -->
                <div id="result" class="mt-4 text-center"></div>
                <!-- /Result Display -->

            </div>
        </section>

    </header>

    <script>
        function searchUser() {
            var searchInput = document.getElementById('search').value;

            fetch('', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'search=' + encodeURIComponent(searchInput)
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('result').innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function deleteUser(username) {
            if (!confirm("Are you sure you want to delete this user?")) {
                return;
            }

            fetch('', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'delete=' + encodeURIComponent(username)
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('result').innerHTML = data;
                // Optionally clear search input and result after deletion
                document.getElementById('search').value = '';
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>

</body>

</html>
