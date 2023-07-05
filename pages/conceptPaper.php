<?php
session_start();
if (!isset($_SESSION['student_regNo'])) {
    header("Location: loginStudent.php");
    exit();
}

    $student_Id = $_SESSION['student_regNo'];

    $mysqli = require __DIR__ . "/database.php";

    $query = "SELECT concept_paper.deadline, CONCAT(supervisor.first_name, ' ', supervisor.last_name) AS lecturer_name
              FROM concept_paper
              INNER JOIN supervisor ON concept_paper.staff_id = supervisor.staff_ID
              WHERE concept_paper.student_id = '$student_Id'";
    $result = mysqli_query($conn, $query);

if ($result) {
$row = mysqli_fetch_assoc($result);
$deadline = $row['deadline'];
$lecturerName = $row['lecturer_name'];

$submissionDate = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $projectTitle = $_POST['proposed_title'];
    $description = $_POST['description'];
    $solution = $_POST['solution'];
    $tools = $_POST['tools'];

    $updateQuery = "UPDATE students SET project_title = '$projectTitle' WHERE student_id = '$student_Id'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "Project title updated successfully.<br>";
    } else {
        echo "Error updating project title: " . mysqli_error($conn) . "<br>";
    }

    $insertQuery = "INSERT INTO concept_paper (student_id, project_title, problem_description, proposed_solution, tools, date_submitted)
                    VALUES ('$student_Id', '$projectTitle', '$description', '$solution', '$tools',$submissionDate)";

    if (mysqli_query($conn, $insertQuery)) {
        // Concept paper inserted successfully
        echo "Concept paper submitted successfully.";
    } else {
        // Error inserting concept paper
        echo "Error submitting concept paper: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | Concept Paper</title>
    <link href="../css/conceptPaper.css" rel="stylesheet" />
    <?php
    require_once "../reusables/head.php"
    ?>
</head>
<body>
    <?php
require_once "../reusables/header.php"
    ?>
  <div class="main-container">
      <?php
      require_once "../reusables/navigationBar.php"
      ?>
    <div class="content">
      <div class="conceptPaper rectangle">Concept Paper</div>
      <div class="conceptDetails rectangle">
        <h2>Concept Paper</h2>
        <div class="set">
          <h3>Deadline: </h3>
            <span><?php echo $lecturerName; ?></span>
        </div>
        <div class="set">
          <h3>Supervisor's Name:</h3>
            <span><?php echo $deadline; ?></span>
        </div>
        <form action="conceptPaper.php" method="post">
            <div class="form-row">
                <label for="proposed_title"> Proposed Project Title:</label><input id="proposed_title" type="text" name="proposed_title">
            </div>
          <div class="form-row">
            <label for="description">Problem Description and Justification:</label><input type="text" id="description" name="description">
          </div>
            <div class="form-row">
            <label for="solution" >Proposed Solution:</label><input id="solution" name="solution">
          </div>
            <div class="form-row">
                <label for="tools" >Proposed Tools for Solution:</label><input id="tools" name="tools">
            </div>
            <button id="submit" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>