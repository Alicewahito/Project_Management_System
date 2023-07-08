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
    $architectureMarks = $_POST['architecture_marks'];
    $processDesignMarks = $_POST['process_design_marks'];
    $databaseMarks = $_POST['database_marks'];
    $interfaceMarks = $_POST['interface_design_marks'];

    $totalMarks = $architectureMarks + $processDesignMarks + $databaseMarks + $interfaceMarks;

    $insertQuery = "INSERT INTO system_design_marks (student_id,date_marked, solution_architecture_design, process_design, database_design, interface_design )
                VALUES ('$studentId', '$submissionDate','$architectureMarks', '$processDesignMarks', '$databaseMarks', '$interfaceMarks')";
    $insertResult = mysqli_query($mysqli, $insertQuery);

    // Redirect to a success page or any other desired page
    header("Location: supervisorDesignSubmission.php");
    exit();
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | System Design Marks </title>
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
                        <td>Solution Architecture Design</td>
                        <td>
                            <ul>
                                <li>S/W architecture: Statement of proposed organisation of system into components/sub-systems</li>
                                <li>>S/W architecture: Target Software choices </li>
                                <li> >H/W architecture: statement of proposed organisation </li>
                                <li>>H/W architecture: Target hardware specifications: HDD, processor, network specification etc.</li>
                            </ul>
                        </td>
                        <td> 8 </td>
                        <td ><input name="architecture_marks"></td>
                    </tr>
                    <tr>
                        <td>Process Design </td>
                        <td>  <ul>
                                <li> Revision of Logical DFDs to Physical DFDs</li>
                                <li> Quality of program Structure Charts</li>
                                <li>Quality of program specifications</li>
                            </ul></td>
                        <td>6</td>
                        <td> <input name="process_design_marks"></td>
                    </tr>
                    <tr>
                        <td>Database Design</td>
                        <td>
                            <ul>
                                <li><li>Translation of logical data models to physical database </li></li>
                                <li> Demonstration of intentions to apply best practice</li>
                            </ul>
                        </td>
                        <td>4</td>
                        <td>Marks:<input name="database_marks"></td>
                    </tr>
                    <tr>
                        <td>Interface Design </td>
                        <td><ul>
                                <li>Input Designs</li>
                                <li>Output Designs</li>
                                <li>Navigation design</li>
                                <li> Evidence of application of principles of interface design</li>
                                <li>Credibility of effort to do interface design</li>
                            </ul>
                        </td>
                        <td>10</td>
                        <td><input name="interface_design_marks"></td>
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

