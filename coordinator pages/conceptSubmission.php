<?php
session_start();

if (!isset($_SESSION['Staff_ID'])) {
    header("Location: ../studentPages/loginSupervisor.php");
    exit();
}

$studentId = $_GET['student_id'];
$mysqli = require __DIR__ . "/database.php";

$studentQuery = "SELECT * FROM students WHERE student_regNo = '$studentId'";
$studentResult = mysqli_query($mysqli, $studentQuery);
$student = mysqli_fetch_assoc($studentResult);


if (!$student) {
    echo "Student not found.";
    exit();
}


$query = "SELECT * FROM concept_paper WHERE student_id = '$studentId'";
$result = mysqli_query($mysqli, $query);
$conceptPaper = mysqli_fetch_assoc($result);

if (!$conceptPaper) {
    echo "Concept paper not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $remarks = $_POST['remarks'];

    $updateQuery = "UPDATE concept_paper SET remarks = '$remarks' WHERE student_id = '$studentId'";
    $updateResult = mysqli_query($mysqli, $updateQuery);

    if ($updateResult) {
        echo "Remarks submitted successfully.";
    } else {
        echo "Failed to submit remarks. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | Concept paper Submission</title>
    <link href="../css/main.css" rel="stylesheet"/>
  <link href="../css/conceptSubmission.css" rel="stylesheet">
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
      <h2>Submission Status</h2>
        <div class="grid-container">
            <div class="grid-item">
                <p class="odd"> Student Name</p>
                <p class="even">Due Date </p>
                <p class="odd"> proposed title: </p>
                <p class="even">Problem Definition</p>
                <p class="odd">Problem Description & Justification: </p>
                <p class="even"> Proposed Solution:</p>
                <p class="odd">Proposed Tools for Solution:</p>
                <p class="even">Remarks:</p>
            </div>
            <div class="grid-item">
                <p id="stName" class="odd"><?php echo $student['first_name'] . ' ' . $student['last_name']; ?></p>
                <p id="dueDate" class="even"> <?php echo $conceptPaper['deadline']; ?></p>
                <p id="proposed_title" class="odd"> <?php echo $conceptPaper['proposed_title']; ?></p>
                <p id="problem_definition" class="even"><?php echo $conceptPaper['problem_definition']; ?></p>
                <p id="description" class="odd"> <?php echo $conceptPaper['problem_description']; ?></p>
                <p id="solution" class="even"> <?php echo $conceptPaper['proposed_solution']; ?></p>
                <p  id="tools" class="odd">  <?php echo $conceptPaper['tools']; ?> </p>
                <form action="conceptSubmission.php" method="post">
                    <textarea  class="even" name="remarks" rows="5" cols="40"><?php echo $conceptPaper['remarks']; ?></textarea>
                    <button type="submit" name="submit_remarks">Submit Remarks</button>
                </form>
            </div>
        </div>
        <form method="POST" action="conceptSubmission.php?student_id=<?php echo $studentId; ?>">
            <button type="submit" name="approve_concept">Approve Concept</button>
        </form>
    </div>
  </div>
</body>
</html>