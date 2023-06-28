<?php
$is_invalid = false;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";
    $sql = sprintf("SELECT * FROM students
                    WHERE email = '%s'",
    $mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {

        if (password_verify($_POST["password"], $user["password_hash"])) {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("Location: index.php");
            exit;
        }
    }

    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project's Portal Log In</title>
    <link href="../css/login.css" rel="stylesheet"/>
</head>
<body>
    <div id="loginForm">
        <header>
            <img src="../images/Logo.png" alt="logo" id="logo"/>
        </header>

        <?php if ($is_invalid): ?>
            <em>Invalid login</em>
        <?php endif; ?>

        <form id="form"  method="post">
                <input name="email" placeholder="Emailaddress" type="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required />
                <input name="password" placeholder="password" type="password" required />
            <button id="login" type="submit"> Login </button>
          </form>
        <p>Forgot <a href="">Password</a></p>
        <p class="signup">No account? <a href="signup.html">Sign up</a></p>
    </div>


</body>

</html>