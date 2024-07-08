<?php
session_start();

// Redirect to login page if session variables are not set
if (!isset($_SESSION['username']) || !isset($_SESSION['type']) || $_SESSION['type'] !== 'teacher') {
    header("Location: login.php");
    exit();
}

// Output username and class
//echo "Welcome, " . $_SESSION['username'] . "<br>";
//echo "Class: " . $_SESSION['username'];
//echo "Class: " . $_SESSION['type'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind Admin Starter Template : Tailwind Toolbox</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" /> <!--Replace with your tailwind.css once created-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
        integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

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
        <?php include "nav.php" ?>

        <section style="margin-left: 5%; width: 100%;">
            <div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5" style="width: 100%;" >

                <div class="analytics-section">
                    <div class="analytics-header">
                        <h1 class="font-bold pl-2">Attendance System</h1>
                    </div>
                </div>

                <!-- Student Entry Form -->
                <div style="text-align: center; margin-top: 1.25rem; ">
                    <h2 class="text-xl font-semibold mb-2">Enter Student Data</h2>
                    <form id="studentForm" style="display: inline-block; width: 100%; max-width: 400px;">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                            <input type="text" id="name" name="name"
                                class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                                placeholder="Enter student's name" required>
                        </div>
                        <div class="mb-4">
                            <label for="class" class="block text-gray-700 text-sm font-bold mb-2">Class:</label>
                            <input type="text" id="class" name="class"
                                class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                                placeholder="Enter student's class" required>
                        </div>
                        <div class="mb-4">
                            <label for="rollnumber" class="block text-gray-700 text-sm font-bold mb-2">Roll
                                Number:</label>
                            <input type="text" id="rollnumber" name="rollnumber"
                                class="px-3 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                                placeholder="Enter student's roll number" required>
                        </div>
                        <!-- Add more fields as needed -->
                        <button type="button"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            onclick="submitForm()">Submit</button>
                    </form>
                </div>
                <!-- /Student Entry Form -->

                <!-- Result Display -->
                <div id="result" class="mt-4 text-center"></div>
                <!-- /Result Display -->

            </div>
        </section>

    </header>

    <script>
        function submitForm() {
            var form = document.getElementById('studentForm');
            var formData = new FormData(form);

            // Example of using fetch to make an AJAX request
            fetch('../backend/enter_student.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Display the response
                document.getElementById('result').innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>

</body>

</html>
