<?php
session_start();
if (!isset($_SESSION['staff_ID'])) {
    header("Location: login.php");
    exit();
}

$staffID = $_SESSION['staff_ID'];
$studentId = $_SESSION['student_id'];

$mysqli = require __DIR__ . "/database.php";

$query = "SELECT students.first_name, students.last_name, students.project_title, students.class
          FROM students
          JOIN proposal ON students.student_regNo = proposal.student_id
          WHERE proposal.staff_id = '$staffID'";
$result = mysqli_query($mysqli, $query);

if (!$result) {
    die("Error retrieving proposals: " . mysqli_error($mysqli));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | Proposal</title>
    <link href="../css/CoordinatorProposal.css" rel="stylesheet">
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
        <div class="proposal rectangle">Proposal</div>
        <div class="proposalDetails rectangle">
            <h2>Proposal</h2>
            <div class="list-container">
                <div class="row">
                    <h3> Student Name </h3>
                    <h3>Project Title </h3>
                    <h3> Class </h3>
                    <h3>view submissions</h3>
                </div>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><?php echo $row['project_title']; ?> </p>
                    <p><?php echo $row['class']; ?></p>
                    <p> <a href="supervisorProposalSubmission.php?studentId=<?php echo $row['student_id']; ?>"> </p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p> <?php echo $row['project_title']; ?></p>
                    <p><?php echo $row['class']; ?></p>
                    <p> <a href="supervisorProposalSubmission.php?studentId=<?php echo $row['student_id']; ?>"></p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><?php echo $row['project_title']; ?> </p>
                    <p><?php echo $row['class']; ?></p>
                    <p> <a href="supervisorProposalSubmission.php?studentId=<?php echo $row['student_id']; ?>"> view </a></p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><?php echo $row['project_title']; ?> </p>
                    <p><?php echo $row['class']; ?></p>
                    <p><a href="supervisorProposalSubmission.php?studentId=<?php echo $row['student_id']; ?>"> view </a></p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p> <?php echo $row['project_title']; ?></p>
                    <p><?php echo $row['class']; ?></p>
                    <p><a href="supervisorProposalSubmission.php?studentId=<?php echo $row['student_id']; ?>"> view </a></p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p> <?php echo $row['project_title']; ?></p>
                    <p><?php echo $row['class']; ?></p>
                    <p><a href="supervisorProposalSubmission.php?studentId=<?php echo $row['student_id']; ?>"> view </a></p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p> <?php echo $row['project_title']; ?></p>
                    <p><?php echo $row['class']; ?></p>
                    <p> <a href="supervisorProposalSubmission.php?studentId=<?php echo $row['student_id']; ?>"> view </a></p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><?php echo $row['project_title']; ?> </p>
                    <p><?php echo $row['class']; ?></p>
                    <p><a href="supervisorProposalSubmission.php?studentId=<?php echo $row['student_id']; ?>"> view </a></p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><?php echo $row['project_title']; ?> </p>
                    <p><?php echo $row['class']; ?></p>
                    <p><a href="supervisorProposalSubmission.php?studentId=<?php echo $row['student_id']; ?>"> view </a></p>
                </div>
                <div class="row">
                    <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                    <p><?php echo $row['project_title']; ?> </p>
                    <p><?php echo $row['class']; ?></p>
                    <p><a href="supervisorProposalSubmission.php?studentId=<?php echo $row['student_id']; ?>"> view </a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>