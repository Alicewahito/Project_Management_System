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

$staffID= $_SESSION['staff_ID']; // Adjust the session variable accordingly
$supervisorQuery = "SELECT first_name, last_name FROM supervisor WHERE staff_ID = '$staffID'";
$supervisorResult = mysqli_query($mysqli, $supervisorQuery);
$supervisorRow = mysqli_fetch_assoc($supervisorResult);
$supervisorFirstName = $supervisorRow['first_name'];
$supervisorLastName = $supervisorRow['last_name'];

$submissionDate = date("Y-m-d"); // Get the current date

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $introductionMarks = $_POST['introduction_marks'];
    $literatureReviewMarks = $_POST['literature_review_marks'];
    $methodologyMarks = $_POST['methodology_marks'];
    $referencesMarks = $_POST['references_marks'];

    $insertQuery = "INSERT INTO proposal_marks (student_id, introduction, literature_review, methodology, references_score)
                VALUES ('$studentId', '$introductionMarks', '$literatureReviewMarks', '$methodologyMarks', '$referencesMarks')";
    $insertResult = mysqli_query($mysqli, $insertQuery);

// Calculate total marks
    $totalMarksQuery = "SELECT SUM(introduction + literature_review + methodology + references_score) AS total_marks FROM proposal_marks WHERE student_id = '$studentId'";
    $totalMarksResult = mysqli_query($mysqli, $totalMarksQuery);
    $totalMarksRow = mysqli_fetch_assoc($totalMarksResult);
    $totalMarks = $totalMarksRow['total_marks'];

    $query ="INSERT INTO proposal_marks(total_marks) VALUES ('$totalMarks')";

    header("Location: supervisorProposalSubmission.php");
    exit();

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | Proposal Marks </title>
    <link href="../css/proposalMarks.css" rel="stylesheet">
    <?php
    require_once "../reusables/head.php"
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
        <form action="proposalMarks.php" method="post">
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th>Section </th>
                    <th>SubSections</th>
                    <th>Content</th>
                    <th>Max Marks</th>
                    <th>Marks Scored</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td rowspan="6">Introduction</td>
                    <td>Cover Page</td>
                    <td>
                    Should have all the mandatory Details:
                    <ul>
                        <li>Kenyatta University</li>
                        <li>Department of CIT</li>
                        <li>Course code and Title</li>
                        <li>Project Title</li>
                        <li>student Name, Registration Number</li>
                        <li>Project Supervisor's Name</li>
                    </ul></td>
                    <td> 2 </td>
                    <td></td>

                </tr>
                <tr>
                    <td>Background</td>
                    <td> Background: Information how the organisation operates.</td>
                    <td>1</td>
                    <td> </td>
                </tr>
                <tr>
                    <td>Problem Statement</td>
                    <td>Problem Statement: Concise description of the issues to be addressed.</td>
                    <td>1</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Justification</td>
                    <td>Problem justification: student to shoe that project is challenging enough.</td>
                    <td>2</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Objectives</td>
                    <td>Desribale outcomes to be achieved by project.</td>
                    <td>4</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Scope and Limitations</td>
                    <td> A statement that shows what will be covered and why</td>
                    <td>2</td>
                    <td>Total Introduction Marks:<input name="introduction_marks"></td>
                </tr>
                <tr>
                    <td>Literature Review</td>
                    <td></td>
                    <td>(expected 3-5 pages)
                        <ul>
                            <li>Theoretical themes </li>
                            <li> Existing products</li>
                            <li> Technologies</li>
                            <li>Methodologies</li>
                            <li>Interpretation of Lit Review for current project</li>
                            <li>appropriate citation</li>
                        </ul>
                    </td>
                    <td>8</td>
                    <td>Total Lit Review Marks:<input name="literature_review_marks"></td>
                </tr>
                <tr>
                    <td rowspan="5">Methodology</td>
                    <td>Development methodology, Project Schedule, Project Budget</td>
                    <td><ul>
                            <li>Statement of development methodology choice</li>
                            <li>Brief Description of methodology stages</li>
                            <li>Justification of choice made:</li>
                            <li>Gantt Chart, PERT chart,Time table etc.</li>
                            <li>Credible project budget with list of requirements and costs</li>
                        </ul>
                    </td>
                    <td>10</td>
                    <td><input name="methodology_marks"></td>
                </tr>

                <tr>
                    <td>References</td>
                    <td>APA format: Must have a mix of books, journals and Websites(online sources)</td>
                    <td>2</td>
                    <td><input name="references_marks"></td>
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
        <button type="submit"> Submit</button>
    </form>


    </div>
</div>
</body>
</html>
