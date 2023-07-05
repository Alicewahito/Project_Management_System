<?php
session_start();
if (!isset($_SESSION['staff_ID'])) {
    header("Location: login.php");
    exit();
}

$staffID = $_SESSION['staff_ID'];
$studentId = $_SESSION['student_id'];

$mysqli = require __DIR__ . "/database.php";

$query = "SELECT system_analysis.*, student.first_name, student.last_name ,
          FROM system_analysis 
          JOIN students ON system_analysis.student_id = student.student_regNo 
          WHERE system_analysis.staff_id = '$staffID'";
$result = mysqli_query($mysqli, $query);

$analysis = mysqli_fetch_assoc($result);

if (!$analysis) {
    echo "System Analysis not found";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted remarks and grading status
    $remarks = $_POST['remarks'];
    $gradingStatus = $_POST['status'];

    // Update the database with the remarks and grading status
    $updateQuery = "UPDATE system_analysis 
                    SET remarks = '$remarks', status = '$gradingStatus' 
                    WHERE analysis_id = '$analysisId'";
    $updateResult = mysqli_query($mysqli, $updateQuery);

    if ($updateResult) {
        header("Location: supervisorAnalysisSubmission.php");
        exit();
    } else {
        echo "Failed to update remarks and grading status. Please try again.";
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProjectHub | Analysis Submission</title>
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/proposalSubmission.css" rel="stylesheet">
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
        <div class="conceptPaper rectangle">System Analysis </div>
        <div class="ConceptDetails rectangle">
            <h2>Submission Status</h2>
            <div class="grid-container">
                <div class="grid-item">
                    <p class="odd">Student Name</p>
                    <p class="even"> Deadline</p>
                    <p class="odd"> Grading Status </p>
                    <p class="even"> File Submission </p>
                    <p class="odd">Remarks:</p>
                </div>
                <div class="grid-item">
                    <p id="stName" class="odd"><?php echo $analysis['first_name'] . ' ' . $analysis['last_name']; ?></p>
                    <p id="dueDate" class="even">  <?php echo $analysis['deadline']; ?></p>
                    <p class="odd"><a href="<?php echo $analysis['file_path']; ?>"> Download</p>
                    <form action="supervisorAnalysisSubmission.php" method="post">
                        <select name="gradingStatus" class="even">
                            <option value="pending" <?php echo ($analysis['grading_status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                            <option value="reviewed" <?php echo ($analysis['grading_status'] == 'reviewed') ? 'selected' : ''; ?>>Reviewed</option>
                            <option value="complete" <?php echo ($analysis['grading_status'] == 'complete') ? 'selected' : ''; ?>>Complete</option>
                        </select>
                        <textarea  class="even" name="remarks" rows="5" cols="40"><?php echo $analysis['remarks']; ?></textarea>
                    </form>
                </div>
            </div>
            <button id="submit" type="submit">Submit Remarks</button>
        </div>
        <div class="grading rectangle">
            <h2> Award Marks </h2>
            <div class="grading-grid">
                <p><?php echo $analysis['first_name'] . ' ' . $analysis['last_name']?></p>
                <p id="submission-type">System Analysis</p>
                <input id="marks">
            </div>
            <button id="submit" type="submit" onclick="location.href='award_marks.php?analysis_id=<?php echo $analysisId; ?>'">>Submit Marks</button>
        </div>
    </div>
</body>
</html>

