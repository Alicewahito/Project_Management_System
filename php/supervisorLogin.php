<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $supervisor_email = $_POST['supervisor_email'];
    $supervisor_password = $_POST['supervisor_password'];

    if (empty($supervisor_email) || empty($supervisor_password)) {
        echo 'Please enter both email and password.';
        exit;
    }

    $mysqli = require __DIR__ . "/database.php";

    $query = "SELECT staff_ID, first_name FROM supervisor WHERE email_address = '$supervisor_email' AND password = '$supervisor_password'";
    $result = $mysqli->query($query);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $staffID = $row['staff_ID'];
        $supervisor_name = $row['first_name'];


        $_SESSION['staff_ID'] = $staffID;
        $_SESSION['first_name'] = $supervisor_name;

        header("Location: ../pages/supervisorDashboard.php");
        exit();
    } else {
        // Invalid login credentials
        echo "Invalid email_address or password. Please try again.";
    }
}

