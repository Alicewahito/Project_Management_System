<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $supervisor_email = $_POST['supervisor_email'];
    $supervisor_password = $_POST['supervisor_password'];

    if (empty($supervisor_email) || empty($supervisor_password)) {
        $message = 'Please enter both email and password.';
        header("Location: ../supervisorPages/loginSupervisor.php?msg=$message");
        exit();
    }

    $mysqli = require __DIR__ . "/database.php";

    $query = "SELECT * FROM supervisor WHERE email_address = '$supervisor_email'";
    $result = $mysqli->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $staffID = $row['staff_ID'];
        $supervisorEmail = $row['email_address'];
        $hashedPassword = $row['password'];
        $firstName = $row['first_name'];
        $lastName = $row['last_name'];

        if (password_verify($supervisor_password, $hashedPassword)) {

            $_SESSION['staff_ID'] = $staffID;
            $_SESSION['email_address'] = $supervisorEmail;
            $_SESSION['email_address'] = $supervisorEmail;
            $_SESSION['supervisorName'] = $firstName . ' ' . $lastName;

            header("Location: ../supervisorPages/supervisorDashboard.php");
            exit();
        } else {
            $message = "Incorrect password. Please try again.";
            header("Location: ../supervisorPages/loginSupervisor.php?msg=$message");
            exit();
        }

    }
    else{
        $message = "Please try again.";
        header("Location: ../supervisorPages/loginSupervisor.php?msg=$message");
        exit();
    }
}
