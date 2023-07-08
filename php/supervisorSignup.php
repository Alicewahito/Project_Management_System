<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $staffId = $_POST['staffId'];
    $email = $_POST['email'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
}

if (empty($_POST["firstName"])) {
    $message = "First Name is required";
    header("Location: ../studentPages/userSignup.php?msg=$message");
    exit();
}
if (empty($_POST["lastName"])) {
    $message = "Last Name is required";
    header("Location: ../studentPages/userSignup.php?msg=$message");
    exit();
}
if (empty($_POST["staffId"])) {
    $message = "staffId is required";
    header("Location: ../studentPages/userSignup.php?msg=$message");
    exit();
}
if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $message = "Valid email is required";
    header("Location: ../studentPages/userSignup.php?msg=$message");
    exit();
}

if (strlen($_POST["newPassword"]) < 8) {
    $message = "Password must be at least 8 characters";
    header("Location: ../studentPages/userSignup.php?msg=$message");
    exit();
}

if ( ! preg_match("/[a-z]/i", $_POST["newPassword"])) {
    $message = "Password must contain at least one letter";
    header("Location: ../studentPages/userSignup.php?msg=$message");
    exit();
}

if ( ! preg_match("/[0-9]/", $_POST["newPassword"])) {
    $message = "Password must contain at least one number";
    header("Location: ../studentPages/userSignup.php?msg=$message");
    exit();
}

if ($_POST["newPassword"] !== $_POST["confirmPassword"]) {
    $message = "Passwords must match";
    header("Location: ../studentPages/userSignup.php?msg=$message");
    exit();
}
$password_hash = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

try{
    $insertQuery = "INSERT INTO supervisor (first_name, last_name, staff_ID, email_address, password) VALUES ('$firstName', '$lastName', '$staffId', '$email','$password_hash')";
    if (mysqli_query($mysqli, $insertQuery)){
        $message = "Signed Up Successfully, kindly login";
        header("Location: ../studentPages/loginSupervisor.php?msg=$message");
    }else{
        $message = "Error: " . $insertQuery . "</br>" . mysqli_error($mysqli);
        header("Location: ../studentPages/userSignup.php?msg=$message");
        exit();
    }
}catch (Exception $e)
{
    return $e;
}






