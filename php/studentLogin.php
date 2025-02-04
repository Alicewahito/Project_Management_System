<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $student_email = $_POST['student_email'];
        $student_password = $_POST['student_password'];

        if (empty($student_email) || empty($student_password)) {
            $message = 'Please enter both email and password.';
            header("Location: ../studentPages/loginStudent.php?msg=$message");
            exit();
        }

        $mysqli = require __DIR__ . "/database.php";

        $query = "SELECT * FROM students WHERE email_address = '$student_email'";
        $result = $mysqli->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            $studentId = $row['student_regNo'];
            $studentEmail = $row['email_address'];
            $hashedPassword = $row['password'];
            $firstName = $row['first_name'];
            $lastName = $row['last_name'];

            if (password_verify($student_password, $hashedPassword)) {
                // Password is correct
                $_SESSION['student_regNo'] = $studentId;
                $_SESSION['studentEmail'] = $studentEmail;
                $_SESSION['email_address'] = $studentEmail;
                $_SESSION['studentName'] = $firstName . ' ' . $lastName;

                header("Location: ../studentPages/studentDashboard.php");
                exit();
            } else {

                $message = "Incorrect password. Please try again.";
                header("Location: ../studentPages/loginStudent.php?msg=$message");
                exit();
            }
        }else{
            $message = "Please try again.";
            header("Location: ../studentPages/loginStudent.php?msg=$message");
            exit();
        }

    }





