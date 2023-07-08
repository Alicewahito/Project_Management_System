<?php
session_start();
if (!isset($_SESSION['staff_ID'])) {
    header("Location: login.php");
    exit();
}

$staffID = $_SESSION['staff_ID'];
$studentId = $_SESSION['student_id'];

$mysqli = require __DIR__ . "/database.php";

$query = "SELECT system_design.*, student.first_name, student.last_name 
          FROM system_design 
          JOIN students ON system_design.student_id = student.student_regNo 
          WHERE system_design.design_id = '$designId'";
$result = mysqli_query($mysqli, $query);
$design = mysqli_fetch_assoc($result);

if (!$design) {
    echo "System Design not found";
    exit();
}

// Process form submission if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $remarks = $_POST['remarks'];
    $gradingStatus = $_POST['status'];

    // Update the database with the remarks and grading status
    $updateQuery = "UPDATE system_design 
                    SET remarks = '$remarks', status = '$gradingStatus' 
                    WHERE design_id = '$designId'";
    $updateResult = mysqli_query($mysqli, $updateQuery);

    // Check if the update was successful
    if ($updateResult) {
        // Redirect to the success page or any other desired page
        header("Location: supervisorDesignSubmission.php");
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
    <title>ProjectHub | Proposal Submission</title>
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
        <div class="conceptPaper rectangle">System Design </div>
        <div class="ConceptDetails rectangle">
            <h2>Submission Status</h2>
            <div class="grid-container">
                <div class="grid-item">
                    <p class="odd">Student Name</p>
                    <p class="even"> Due Date</p>
                    <p class="odd"> Grading Status </p>
                    <p class="even"> File Submission </p>
                    <p class="odd">Remarks:</p>
                </div>
                <div class="grid-item">
                    <p id="stName" class="odd"><?php echo $design['first_name'] . ' ' . $design['last_name']; ?></p>
                    <p id="dueDate" class="even"> <?php echo $design['deadline']; ?></p>
                    <p class="odd"> <a href="<?php echo $design['file_path']; ?>">Download</a></p>
                    <form action="supervisorDesignSubmission.php" method="post">
                        <select name="gradingStatus" class="even">
                            <option value="pending" <?php echo ($design['grading_status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                            <option value="reviewed" <?php echo ($design['grading_status'] == 'reviewed') ? 'selected' : ''; ?>>Reviewed</option>
                            <option value="complete" <?php echo ($design['grading_status'] == 'complete') ? 'selected' : ''; ?>>Complete</option>
                        </select>
                        <textarea  class="even" name="remarks" rows="5" cols="40"><?php echo $design['remarks']; ?></textarea>
                    </form>
                </div>
            </div>
            <button id="submit" type="submit">Submit Remarks</button>
        </div>
        <div class="grading rectangle">
            <h2> Award Marks </h2>
            <div class="grading-grid">
                <p><?php echo $design['first_name'] . ' ' . $design['last_name']; ?></p>
                <p id="submission-type">Proposal</p>
                <input id="marks">
            </div>
            <button id="submit" type="submit" onclick="location.href='award_marks.php?design_id=<?php echo $designId; ?>'">>Submit Marks</button>
        </div>
    </div>
</body>
</html>
