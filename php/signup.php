<?php
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

$sql = "INSERT INTO students(firstName, lastName, regNo, email, class, password_hash)
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}
$stmt->bind_param("ssssss",
                  $_POST["firstName"],
                  $_POST["lastname"],
                  $_POST["regNo"],
                  $_POST["email"],
                  $_POST["class"],
                  $password_hash);

if ($stmt->execute()) {

    header("Location:/login.html");
    exit;
    
}