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
    die("First Name is required");
}
if (empty($_POST["lastName"])) {
    die("Last Name is required");
}
if (empty($_POST["staffId"])) {
    die("staffId is required");
}
if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["newPassword"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["newPassword"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["newPassword"])) {
    die("Password must contain at least one number");
}

if ($_POST["newPassword"] !== $_POST["confirmPassword"]) {
    die("Passwords must match");
}
$password_hash = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

try{
    $insertQuery = "INSERT INTO supervisor (first_name, last_name, staff_ID, email_address, password) VALUES ('$firstName', '$lastName', '$staffId', '$email','$password_hash')";
    if (mysqli_query($mysqli, $insertQuery)){
        $message = "Signed Up Successfully, kindly login";
        header("Location: ../pages/loginSupervisor.php?msg=$message");
    }else{
        echo "Error: " . $insertQuery . "</br>" . mysqli_error($mysqli);
    }
}catch (Exception $e)
{
    return $e;
}






