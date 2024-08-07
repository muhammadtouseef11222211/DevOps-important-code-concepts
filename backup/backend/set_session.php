<?php
session_start();

if (isset($_POST['class'])) {
    $_SESSION['class'] = $_POST['class'];
    echo "Class set successfully";
}

if (isset($_POST['subject'])) {
    $_SESSION['subject'] = $_POST['subject'];
    echo "Subject set successfully";
}
?>
