<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Signup</title>
    <link href="../css/signup.css" rel="stylesheet" />
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/js/validation.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
<div class="studentSignup">
    <img id="logo" src="../images/Logo.png" alt="logo">
    <div class="signupOption">
        <div class="student" id="student">
            <p>Student Signup</p>
        </div>
        <div class="lecturer" id="lecturer">
            <p>Lecturer Signup</p>
        </div>
    </div>
    <form id="studentSignupForm" class="signupForm" method="../php/signup.php" method="post" onsubmit="studentSignup(event)" novalidate>
        <input name="firstName" placeholder="firstName" type="text" required />
        <input name="lastName" placeholder="lastName" type="text" required />
        <input name="regNo" placeholder="RegNumber" type="text" required />
        <input name="email" placeholder="Emailaddress" type="email" required />
        <select name="class">
            <option value="computerScience">Computer Science</option>
            <option value="InformationTechnology">Information Technology</option>
            <option value="MathAndCompScience">Maths & Comp science</option>
        </select>
        <input name="newPassword" placeholder="newPassword" type="password" required />
        <input name="confirmPassword" placeholder="confirmPassword" type="password" required />
        <button name="register" type="submit" class="submit">SignUp</button>
  </form>
    <form id="supervisorSignupForm" class="signupForm" action="../php/studentSignup.php" method="post" onsubmit="supervisorSignup(event)">
        <input name="firstName" placeholder="firstName" type="text" required />
        <input name="lastName" placeholder="lastName" type="text" required />
        <input name="staffid" placeholder="staffNumber" type="text" required />
        <input name="email" placeholder="Emailaddress" type="email" required />
        <input name="newPassword" placeholder="newPassword" type="password" required />
        <input name="confirmPassword" placeholder="confirmPassword" type="password" required />
        <button name="register" type="submit" class="submit">SignUp</button>
    </form>
    <p>Already have an account?<a href="LoginStudent.php">click here</a></p>
</div>
</body>
<script src="../Javascripts/Signup.js"></script>
</html>