<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_email = $_POST['student_email'];
    $student_password = $_POST['student_password'];

if (empty($student_email) || empty($student_password)){
    echo 'Please enter both email and password.';
    exit;
}

$mysqli = require __DIR__ . "/database.php";

$query = "SELECT student_regNo, first_name FROM students WHERE email_address = '$student_email' AND password = '$student_password'";
$result = $mysqli->query($query);

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $student_id = $row['student_regNo'];
    $student_name = $row['first_name'];


    $_SESSION['student_regNo'] = $student_id;
    $_SESSION['first_name'] = $student_name;

    // Redirect to the student dashboard or any other desired page
    header("Location: ../pages/studentDashboard.php");
    exit();
} else {
    // Invalid login credentials
    echo "Invalid email_address or password. Please try again.";
}
}






