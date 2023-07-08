<?php
session_start();

if (isset($_SESSION["firstName"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["firstName"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="">
</head>
<body>

<h1>Home</h1>

<?php if (isset($user)): ?>

    <p>Hello <?= htmlspecialchars($user["firstName"]) ?></p>

    <p><a href="logout.php">Log out</a></p>

<?php else: ?>

    <p><a href="../studentPages/loginStudent.php">Log in</a> or <a href="../studentPages/userSignup.php">sign up</a></p>

<?php endif; ?>

</body>
</html>
