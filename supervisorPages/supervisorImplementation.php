<?php
session_start();
if (!isset($_SESSION['staff_ID'])) {
    header("Location: login.php");
    exit();
}

$staffID = $_SESSION['staff_ID'];
$studentId = $_SESSION['student_id'];

$mysqli = require __DIR__ . "/database.php";

$query = "SELECT implementation.*, student.first_name, student.last_name, student.project_title, student.class 
          FROM implementation 
          JOIN students ON implementation.student_id = student.student_regNo 
          WHERE student.staff_id = '$staffID'";
$result = mysqli_query($mysqli, $query);

// Check if any system implementation submissions exist
if (mysqli_num_rows($result) === 0) {
    echo "No system implementation submissions found for your assigned students.";
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | System Implementation </title>
    <link href="../css/supervisorImplementation.css" rel="stylesheet">
    <?php
    require_once "../reusables/head.php"
    ?>
</head>
<body>
<?php
require_once "../reusables/header.php"
?>
<div class="container">
    <?php
    require_once "../reusables/supervisorNavigationBar.php"
    ?>
    <div class="content">
        <div class="implementation rectangle">System Implementation</div>
        <div class="implementationDetails rectangle">
            <h2>System Implementation</h2>
            <div class="list-container">
                <div class="row">
                    <h3>student Name</h3>
                    <h3>Project Title</h3>
                    <h3>class</h3>
                    <h3>view submissions</h3>
                </div>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><?php echo $row['project_title']; ?> </p>
                    <p><?php echo $row['class']; ?></p>
                    <p> <a href="supervisorImplementationSubmission.php?implementation_id=<?php echo $row['implementation_id']; ?>">view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><?php echo $row['project_title']; ?> </p>
                    <p><?php echo $row['class']; ?></p>
                    <p> <a href="supervisorImplementationSubmission.php?implementation_id=<?php echo $row['implementation_id']; ?>">view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><?php echo $row['project_title']; ?> </p>
                    <p><?php echo $row['class']; ?></p>
                    <p> <a href="supervisorImplementationSubmission.php?implementation_id=<?php echo $row['implementation_id']; ?>">view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><?php echo $row['project_title']; ?> </p>
                    <p><?php echo $row['class']; ?></p>
                    <p> <a href="supervisorImplementationSubmission.php?implementation_id=<?php echo $row['implementation_id']; ?>">view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><?php echo $row['project_title']; ?> </p>
                    <p><?php echo $row['class']; ?></p>
                    <p> <a href="supervisorImplementationSubmission.php?implementation_id=<?php echo $row['implementation_id']; ?>">view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><?php echo $row['project_title']; ?> </p>
                    <p><?php echo $row['class']; ?></p>
                    <p> <a href="supervisorImplementationSubmission.php?implementation_id=<?php echo $row['implementation_id']; ?>">view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><?php echo $row['project_title']; ?> </p>
                    <p><?php echo $row['class']; ?></p>
                    <p> <a href="supervisorImplementationSubmission.php?implementation_id=<?php echo $row['implementation_id']; ?>">view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><?php echo $row['project_title']; ?> </p>
                    <p><?php echo $row['class']; ?></p>
                    <p> <a href="supervisorImplementationSubmission.php?implementation_id=<?php echo $row['implementation_id']; ?>">view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><?php echo $row['project_title']; ?> </p>
                    <p><?php echo $row['class']; ?></p>
                    <p> <a href="supervisorImplementationSubmission.php?implementation_id=<?php echo $row['implementation_id']; ?>">view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><?php echo $row['project_title']; ?> </p>
                    <p><?php echo $row['class']; ?></p>
                    <p> <a href="supervisorImplementationSubmission.php?implementation_id=<?php echo $row['implementation_id']; ?>">view</a> </p>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</body>
</html>

