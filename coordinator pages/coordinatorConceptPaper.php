<?php
session_start();

// Check if the coordinator is logged in
if (!isset($_SESSION['staff_ID'])) {
    header("Location: ../studentPages/loginSupervisor.php");
    exit();
}

$mysqli = require __DIR__ . "/database.php";

$query = "SELECT students.student_regNo, students.first_name, student.last_name, student.project_title, student.class
          FROM students
          INNER JOIN concept_paper ON student.student_regNo = concept_paper.student_id";
$result = mysqli_query($mysqli, $query);

if (mysqli_num_rows($result) === 0) {
    echo "No concept paper submissions found.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | Concept Paper</title>
  <link href="../css/supervisorConceptPaper.css" rel="stylesheet">
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
    require_once "../reusables/coordinatorNavigationBar.php"
    ?>
  <div class="content">
    <div class="conceptPaper rectangle">Concept Paper</div>
    <div class="ConceptDetails rectangle">
        <h2>Concept Paper</h2>
        <div class="list-container">
          <div class="row">
              <h3>student Name</h3>
              <h3>Project Title</h3>
              <h3>class</h3>
              <h3>view submissions</h3>
          </div>
            <div><?php while ($row = mysqli_fetch_assoc($result)) { ?>
                  <div class="row">
                      <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                      <p> <?php echo $row['project_title']; ?></p>
                      <p><?php echo $row['class']; ?></p>
                      <p><a href="conceptSubmission.php?student_id=<?php echo $row['student_id']; ?>">View</a> </p>
                  </div>
                  <div class="row">
                      <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                      <p> <?php echo $row['project_title']; ?></p>
                      <p><?php echo $row['class']; ?></p>
                      <p><a href="conceptSubmission.php?student_id=<?php echo $row['student_id']; ?>">View</a> </p>
                  </div>
                  <div class="row">
                      <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                      <p> <?php echo $row['project_title']; ?></p>
                      <p><?php echo $row['class']; ?></p>
                      <p><a href="conceptSubmission.php?student_id=<?php echo $row['student_id']; ?>">View</a> </p>
                  </div>
                  <div class="row">
                      <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                      <p> <?php echo $row['project_title']; ?></p>
                      <p><?php echo $row['class']; ?></p>
                      <p><a href="conceptSubmission.php?student_id=<?php echo $row['student_id']; ?>">View</a> </p>
                  </div>
                  <div class="row">
                      <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                      <p> <?php echo $row['project_title']; ?></p>
                      <p><?php echo $row['class']; ?></p>
                      <p><a href="conceptSubmission.php?student_id=<?php echo $row['student_id']; ?>">View</a> </p>
                  </div>
                  <div class="row">
                      <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                      <p> <?php echo $row['project_title']; ?></p>
                      <p><?php echo $row['class']; ?></p>
                      <p><a href="conceptSubmission.php?student_id=<?php echo $row['student_id']; ?>">View</a> </p>
                  </div>
                  <div class="row">
                      <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                      <p> <?php echo $row['project_title']; ?></p>
                      <p><?php echo $row['class']; ?></p>
                      <p><a href="conceptSubmission.php?student_id=<?php echo $row['student_id']; ?>">View</a> </p>
                  </div>
                  <div class="row">
                      <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                      <p> <?php echo $row['project_title']; ?></p>
                      <p><?php echo $row['class']; ?></p>
                      <p><a href="conceptSubmission.php?student_id=<?php echo $row['student_id']; ?>">View</a> </p>
                  </div>
                  <div class="row">
                      <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                      <p> <?php echo $row['project_title']; ?></p>
                      <p><?php echo $row['class']; ?></p>
                      <p><a href="conceptSubmission.php?student_id=<?php echo $row['student_id']; ?>">View</a> </p>
                  </div>
                  <div class="row">
                      <p><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                      <p> <?php echo $row['project_title']; ?></p>
                      <p><?php echo $row['class']; ?></p>
                      <p><a href="conceptSubmission.php?student_id=<?php echo $row['student_id']; ?>">View</a> </p>
                  </div>
                <?php } ?>
            </div>
        </div>
    </div>
  </div>
</body>
</html>