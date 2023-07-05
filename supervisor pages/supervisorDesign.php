<?php
session_start();
if (!isset($_SESSION['staff_ID'])) {
    header("Location: login.php");
    exit();
}

$staffID = $_SESSION['staff_ID'];
$studentId = $_SESSION['student_id'];

$mysqli = require __DIR__ . "/database.php";

$query = "SELECT system_design.*, student.first_name, student.last_name, student.project_title, student.class 
          FROM system_design 
          JOIN students ON system_design.student_id = student.student_regNo 
          WHERE student.staff_id = '$staffID'";
$result = mysqli_query($mysqli, $query);


if (mysqli_num_rows($result) === 0) {
    echo "No system design submissions found for your assigned students.";
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | System Design </title>
    <link href="../css/supervisorDesign.css" rel="stylesheet">
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
        <div class="design rectangle">System Design</div>
        <div class="designDetails rectangle">
            <h2>System Design</h2>
            <div class="list-container">
                <div class="row">
                    <h3>student Name</h3>
                    <h3>Project Title</h3>
                    <h3>class</h3>
                    <h3>view submissions</h3>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p> <?php echo $row['project_title']; ?></p>
                    <p><?php echo $row['class']; ?></p>
                    <p><a href="supervisorDesignSubmission.php?design_id=<?php echo $row['design_id']; ?>"> view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p> <?php echo $row['project_title']; ?></p>
                    <p><?php echo $row['class']; ?></p>
                    <p><a href="supervisorDesignSubmission.php?design_id=<?php echo $row['design_id']; ?>"> view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p> <?php echo $row['project_title']; ?></p>
                    <p><?php echo $row['class']; ?></p>
                    <p><a href="supervisorDesignSubmission.php?design_id=<?php echo $row['design_id']; ?>"> view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p> <?php echo $row['project_title']; ?></p>
                    <p><?php echo $row['class']; ?></p>
                    <p><a href="supervisorDesignSubmission.php?design_id=<?php echo $row['design_id']; ?>"> view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p> <?php echo $row['project_title']; ?></p>
                    <p><?php echo $row['class']; ?></p>
                    <p><a href="supervisorDesignSubmission.php?design_id=<?php echo $row['design_id']; ?>"> view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p> <?php echo $row['project_title']; ?></p>
                    <p><?php echo $row['class']; ?></p>
                    <p><a href="supervisorDesignSubmission.php?design_id=<?php echo $row['design_id']; ?>"> view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p> <?php echo $row['project_title']; ?></p>
                    <p><?php echo $row['class']; ?></p>
                    <p><a href="supervisorDesignSubmission.php?design_id=<?php echo $row['design_id']; ?>"> view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p> <?php echo $row['project_title']; ?></p>
                    <p><?php echo $row['class']; ?></p>
                    <p><a href="supervisorDesignSubmission.php?design_id=<?php echo $row['design_id']; ?>"> view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p> <?php echo $row['project_title']; ?></p>
                    <p><?php echo $row['class']; ?></p>
                    <p><a href="supervisorDesignSubmission.php?design_id=<?php echo $row['design_id']; ?>"> view</a> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p> <?php echo $row['project_title']; ?></p>
                    <p><?php echo $row['class']; ?></p>
                    <p><a href="supervisorDesignSubmission.php?design_id=<?php echo $row['design_id']; ?>"> view</a> </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
