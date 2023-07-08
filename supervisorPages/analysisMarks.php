<?php
session_start();
if (!isset($_SESSION['staff_ID'])) {
    header("Location: login.php");
    exit();
}

$staffID = $_SESSION['staff_ID'];
$studentId = $_SESSION['student_id'];

$mysqli = require __DIR__ . "/database.php";

$studentQuery = "SELECT first_name, last_name, student_regNo FROM students WHERE student_regNo = '$studentId'";
$studentResult = mysqli_query($mysqli, $studentQuery);
$studentRow = mysqli_fetch_assoc($studentResult);
$firstName = $studentRow['first_name'];
$lastName = $studentRow['last_name'];
$registrationNumber = $studentRow['student_regNo'];

$supervisorQuery = "SELECT first_name, last_name FROM supervisor WHERE staff_ID = '$staffID'";
$supervisorResult = mysqli_query($mysqli, $supervisorQuery);
$supervisorRow = mysqli_fetch_assoc($supervisorResult);
$supervisorFirstName = $supervisorRow['first_name'];
$supervisorLastName = $supervisorRow['last_name'];

$submissionDate = date("Y-m-d"); // Get the current date


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $methodologyMarks = $_POST['methodology_marks'];
    $currentSituationMarks = $_POST['current_situation'];
    $requirementsMarks = $_POST['requirements_marks'];
    $effortMarks = $_POST['effort'];
    $documentQualityMarks = $_POST['document_quality'];

    $totalMarks = $methodologyMarks + $currentSituationMarks + $requirementsMarks + $effortMarks + $documentQualityMarks;

    $insertQuery = "INSERT INTO system_analysis_marks (student_id,methodology, date_marked, current_situation, requirements_definition, effort_credibility, document_quality)
                VALUES ('$studentId', '$methodologyMarks', '$submissionDate','$currentSituationMarks', '$requirementsMarks', '$effortMarks', '$documentQualityMarks')";
    $insertResult = mysqli_query($mysqli, $insertQuery);

    // Redirect to a success page or any other desired page
    header("Location: supervisorAnalysisSubmission.php");
    exit();
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | System Analysis</title>
    <link href="../css/proposalMarks.css" rel="stylesheet">
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
    require_once "../reusables/supervisorNavigationBar.php"
    ?>
    <div class="content">
        <div class="studentDetails">
            <p>Student Name: <?php echo $firstName . ' ' . $lastName; ?></p>
            <p> reg No:<?php echo $registrationNumber; ?>  </p>
        </div>
        <form action="analysisMarks.php" method="post">
            <div class="container">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Assessment Point</th>
                        <th>Description</th>
                        <th>Max Marks</th>
                        <th>Marks Scored</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Methodology Application</td>
                        <td>
                            <ul>
                                <li>Statement of methodology in use ;Familiarity with tools</li>
                                <li>Description of information gathering and analysis strategy </li>
                            </ul>
                            </td>
                        <td> 4 </td>
                        <td ><input name="methodology_marks"></td>
                    </tr>
                    <tr>
                        <td>Description of current situation</td>
                        <td>  <ul>
                                <li>Organisational structure; context diagram</li>
                                <li>process Models eg DFDs</li>
                                <li>Data Models eg ER diagrams</li>
                                <li>Behavioural diagrams eg Event Lists </li>
                            </ul></td>
                        <td>8</td>
                        <td> <input name="current_situation"></td>
                    </tr>
                    <tr>
                        <td>Requirements Definition</td>
                        <td>
                            <ul>
                                <li>Business Requirements </li>
                                <li> User Requirements </li>
                                <li> Functional Requirements </li>
                                <li> non-functional Requirements</li>
                            </ul>
                        </td>
                        <td>8</td>
                        <td>Marks:<input name="requirements_marks"></td>
                    </tr>
                    <tr>
                        <td>Credibility of Effort</td>
                        <td><ul>
                                <li>Evidence of genuine effort to gather information from a real environment</li>
                                <li>Evidence of genuine effort to perform analysis</li>
                                <li>Evidence of genuine effort to synthesize findings into requirements</li>
                            </ul>
                        </td>
                        <td>8</td>
                        <td><input name="effort"></td>
                    </tr>
                    <tr>
                        <td>General Document Quality</td>
                        <td><ul>
                                <li>Language, flow of ideas</li>
                                <li>word processing</li>
                                <li>Diagrams</li>
                            </ul></td>
                        <td>4</td>
                        <td><input name="document_quality"></td>
                    </tr>
                    <tr>
                        <td>Total Marks</td>
                        <td></td>
                        <td>30</td>
                        <td><?php echo $totalMarks; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <p>Supervisor Name: <?php echo $supervisorFirstName . ' ' . $supervisorLastName; ?></p>
            <p>Submitted Date: <?php echo $submissionDate; ?></p>
            <button id="submit" type="submit"> Submit</button>
        </form>


    </div>
</div>
</body>
</html>
