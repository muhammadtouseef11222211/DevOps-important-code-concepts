<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
            
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="password"],
        .form-group select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group .sub-form {
            display: none;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="../backend/teacher_register.php" method="post" id="registerForm">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select id="type" name="type" onchange="showAdditionalFields(this.value)" required>
                    <option value="">Select Type</option>
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="form-group sub-form" id="classGroup">
                <label for="class">Class:</label>
                <input type="text" id="class" name="class" placeholder="Enter class">
            </div>
            <div class="form-group sub-form" id="subjectGroup">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" placeholder="Enter subject">
            </div>
            <button type="submit">Register</button>
        </form>
    </div>

    <script>
        function showAdditionalFields(selectedType) {
            var classGroup = document.getElementById('classGroup');
            var subjectGroup = document.getElementById('subjectGroup');
            var registerForm = document.getElementById('registerForm');

            if (selectedType === 'teacher' || selectedType === 'student') {
                classGroup.style.display = 'block';
                subjectGroup.style.display = selectedType === 'teacher' ? 'block' : 'none';
                classGroup.querySelector('input').setAttribute('required', true);
                if (selectedType === 'teacher') {
                    subjectGroup.querySelector('input').setAttribute('required', true);
                } else {
                    subjectGroup.querySelector('input').removeAttribute('required');
                }
            } else {
                classGroup.style.display = 'none';
                subjectGroup.style.display = 'none';
                classGroup.querySelector('input').removeAttribute('required');
                subjectGroup.querySelector('input').removeAttribute('required');
            }

            if (selectedType === 'teacher' || selectedType === 'student') {
                registerForm.setAttribute('action', '../backend/teacher_register.php');
            } else {
                registerForm.setAttribute('action', '../backend/register.php');
            }
        }
    </script>
</body>
</html>
