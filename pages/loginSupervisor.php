<?php

session_start();
if (isset ($_POST['supervisor-login-form'])){
    $supervisor_email = $_POST['supervisor_email'];
    $supervisor_password = $_POST['supervisor_password'];
    if($supervisor_email === 'email' && $supervisor_password === 'password'){
        $_SESSION['loggedin'] = true;
        $_SESSION['user_type'] = 'supervisor';

        header("Location: ../pages/supervisorDashboard.php");
        exit;
    }else{
        $error = 'Invalid username or password';
    }
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
        <div id="loginFormSupervisor">
            <header>
                <img src="../images/Logo.png" alt="logo" id="logo"/>
            </header>

            <?php if (isset($error)){ ?>
                <p> <?php echo $error; ?></p>
            <?php } ?>

            <form id="supervisor-login-form"  method="post" action="../php/supervisorLogin.php">
                <input name="supervisor_email" placeholder="Email_address" type="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required />
                <input name="supervisor_password" placeholder="password" type="password" required />
                <button id="login" type="submit"> Login </button>
            </form>
            <p>Forgot <a href="">Password</a></p>
            <p class="signup">No account? <a href="userSignup.php">Sign up</a></p>
        </div>

        </body>

</html>