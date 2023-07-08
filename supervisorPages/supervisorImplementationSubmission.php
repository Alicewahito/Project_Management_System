<?php
session_start();
if (!isset($_SESSION['staff_ID'])) {
    header("Location: login.php");
    exit();
}

$staffID = $_SESSION['staff_ID'];
$studentId = $_SESSION['student_id'];

$mysqli = require __DIR__ . "/database.php";

$query = "SELECT implementation.*, student.first_name, student.last_name, student.project_title 
          FROM implementation 
          JOIN students ON implementation.student_id = student.student_regNo 
          WHERE implementation.implementation_id = '$implementationId'";
$result = mysqli_query($mysqli, $query);
$implementation = mysqli_fetch_assoc($result);

if (!$implementation) {
    echo "System implementation submission not found";
    exit();
}

// Process form submission if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $remarks = $_POST['remarks'];
    $gradingStatus = $_POST['grading_status'];

    // Update the database with the remarks and grading status
    $updateQuery = "UPDATE implementation 
                    SET remarks = '$remarks', status = '$gradingStatus' 
                    WHERE implementation_id = '$implementationId'";
    $updateResult = mysqli_query($mysqli, $updateQuery);

    // Check if the update was successful
    if ($updateResult) {
        header("Location: supervisorImplementationSubmission.php");
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
    <title>ProjectHub | Implementation Submission</title>
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
        <div class="conceptPaper rectangle">System Implementation </div>
        <div class="ConceptDetails rectangle">
            <h2>Submission Status</h2>
            <div class="grid-container">
                <div class="grid-item">
                    <p class="odd">Student Name</p>
                    <p class="even"> Deadline</p>
                    <p class="odd"> Full Documentation: </p>
                    <p class="even">Zipped File: </p>
                    <p class="odd"> Github Repository:  </p>
                    <p class="even"> Grading Status </p>
                    <p class="odd">Remarks:</p>
                </div>
                <div class="grid-item">
                    <p id="stName" class="odd"><?php echo $implementation['first_name'] . ' ' . $implementation['last_name']; ?></p>
                    <p id="dueDate" class="even"> <?php echo $implementation['deadline']; ?></p>
                    <p class="odd"> <a href="<?php echo $implementation['documentation']; ?>"> Download </a></p>
                    <p class="even"> <a href="<?php echo $implementation['zipped_file']; ?>">Download</a></p>
                    <?php if ($implementation['repository']): ?>
                        <p class="odd">GitHub Repository: <a href="<?php echo $implementation['repository']; ?>"><?php echo $implementation['github_repository']; ?></a></p>
                    <?php endif; ?>
                    <form action="supervisorImplementationSubmission.php" method="post">
                        <select name="gradingStatus" class="even">
                            <option value="pending" <?php echo ($implementation['grading_status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                            <option value="reviewed" <?php echo ($implementation['grading_status'] == 'reviewed') ? 'selected' : ''; ?>>Reviewed</option>
                            <option value="complete" <?php echo ($implementation['grading_status'] == 'complete') ? 'selected' : ''; ?>>Complete</option>
                        </select>
                        <textarea  class="even" name="remarks" rows="5" cols="40"><?php echo $implementation['remarks']; ?></textarea>
                    </form>
                </div>
            </div>
            <button id="submit" type="submit">Submit Remarks</button>
        </div>
        <div class="grading rectangle">
            <h2> Award Marks </h2>
            <div class="grading-grid">
                <p><?php echo $implementation['first_name'] . ' ' . $implementation['last_name']; ?></p>
                <p id="submission-type">System Implementation</p>
                <input id="marks">
            </div>
            <button id="submit" type="submit" onclick="location.href='award_marks.php?implementation_id=<?php echo $implementationId; ?>'">>Submit Marks</button>
        </div>
    </div>
</body>

