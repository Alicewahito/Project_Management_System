<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $regNo = $_POST['regNo'];
    $email =$_POST['email'];
    $class = $_POST['class'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
}

if (empty($_POST["firstName"])) {
    die("Name is required");
}
if (empty($_POST["lastName"])) {
    die("Name is required");
}
if (empty($_POST["regNo"])) {
    die("registration Number is required");
}
if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}
if (empty($_POST["class"])) {
    die("class is required");
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

    $Query = "INSERT INTO students (firstName, lastName, regNo, email, class, password) VALUES ('$firstName, $lastName, $regNo, $email,$class, $password_hash')";
    if (mysqli_query($mysqli, $Query)){
        echo "Student Registration successfully!";
    }else{
        echo "Error: " . $Query . "</br>" . mysqli_error($mysqli);
    }


