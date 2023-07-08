
<!DOCTYPE 
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
        <?php if (isset($_GET["msg"])){ ?>
            <p> <?php echo $_GET["msg"]; ?></p>
        <?php } ?>
        <form id="student-login-form"  method="post" action="../php/studentLogin.php">
                <input name="student_email" placeholder="Email_address" type="email"  required >
                <input name="student_password" placeholder="password" type="password" required >
            <button id="login" type="submit"> Login </button>
          </form>
        <p>Forgot <a href="">Password</a></p>
        <p class="signup">No account? <a href="userSignup.php">Sign up</a></p>
    </div>

</body>

</html>