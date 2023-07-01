<?php
$supervisor_email = $_POST['supervisor_email'];
$supervisor_password = $_POST['supervisor_password'];

if (empty($supervisor_email) || empty($supervisor_password)){
    echo 'Please enter both email and password.';
    exit;
}

$mysqli = new mysqli('localhost', 'root','', 'project_hub' );
$query = "SELECT * FROM supervisor WHERE email = '$supervisor_email' AND password = '$supervisor_password'";
$result = $mysqli->query($query);

if ($result->num_rows == 1) {
    header('Location: supervisorDashboard.php');
}else {
    echo 'Invalid credentials. Please try again.';
}

$mysqli->close();
?>
