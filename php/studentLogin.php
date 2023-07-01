<?php
$student_email = $_POST['student_email'];
$student_password = $_POST['student_password'];

if (empty($student_email) || empty($student_password)){
    echo 'Please enter both email and password.';
    exit;
}

$mysqli = new mysqli('localhost', 'root','', 'project_hub' );
$query = "SELECT * FROM students WHERE email = '$student_email' AND password = '$student_password'";
$result = $mysqli->query($query);

if ($result->num_rows == 1) {
    header('Location: studentDashboard.php');
}else {
echo 'Invalid credentials. Please try again.';
}

$mysqli->close();
?>