<?php

session_start();
    if (isset ($_POST['student-login-form'])){
                $student_email = $_POST['student_email'];
                $student_password = $_POST['student_password'];
                if($student_email === 'email' && $student_password === 'password'){
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_type'] = 'student';

                header("Location: ../pages/studentDashboard.php");
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
    <title>Project_hub Log In</title>
    <link href="../css/login.css" rel="stylesheet"/>
</head>
<body>
    <div id="loginFormStudent">
        <header>
            <img src="../images/Logo.png" alt="logo" id="logo"/>
        </header>

        <?php if (isset($error)){ ?>
            <p> <?php echo $error; ?></p>
        <?php } ?>

        <form id="student-login-form"  method="post" onsubmit="studentLogin(event)">
                <input name="student_email" placeholder="Emailaddress" type="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required />
                <input name="student_password" placeholder="password" type="password" required />
            <button id="login" type="submit"> Login </button>
          </form>
        <p>Forgot <a href="">Password</a></p>
        <p class="signup">No account? <a href="userSignup.php">Sign up</a></p>
    </div>

</body>

</html>