<?php
session_start();
if (!isset($_SESSION['staff_ID'])) {
    header("Location: login.php");
    exit();
}

$staffID = $_SESSION['staff_ID'];
$studentId = $_SESSION['student_id'];

$mysqli = require __DIR__ . "/database.php";

$query = "SELECT proposal.*, students.first_name, students.last_name, proposal.deadline, proposal.upload_file, proposal.proposal_id 
              FROM students
              JOIN proposal ON students.student_regNo = proposal.student_id
              WHERE students.student_regNo = '$studentId' AND proposal.staff_id = '$staffID'";
$result = mysqli_query($mysqli, $query);
$proposal = mysqli_fetch_assoc($result);

if (!$proposal) {
    die("Error retrieving proposal submission details: " . mysqli_error($mysqli));
}

$row = mysqli_fetch_assoc($result);
$proposalId = ['proposal_id'];
$studentName = $row['first_name'] . ' ' . $row['last_name'];
$deadline = $row['deadline'];
$submittedFile = $row['upload_file'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted remarks
    $remarks = $_POST['remarks'];
    $gradingStatus = $_POST['grading_status'];


     $updateQuery ="UPDATE proposal 
                    SET remarks = '$remarks', status = '$gradingStatus' 
                    WHERE proposal_id = '$proposalId'";
    $updateResult = mysqli_query($mysqli, $updateQuery);
    $proposal = mysqli_fetch_assoc($result);

    if ($updateResult) {
        header("Location: supervisorProposalSubmission.php");
        exit();
    } else {
        echo "Failed to update remarks. Please try again.";
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
        <div class="conceptPaper rectangle">Proposal </div>
        <div class="ConceptDetails rectangle">
            <h2>Submission Status</h2>
            <div class="grid-container">
                <div class="grid-item">
                    <p class="odd">Student Name</p>
                    <p class="even"> Deadline </p>
                    <p class="odd"> File Submission </p>
                    <p class="even"> Grading Status </p>
                    <p class="odd">Remarks:</p>
                </div>
                <div class="grid-item">
                    <p id="stName" class="odd"><?php echo $studentName; ?></p>
                    <p id="dueDate" class="even"><?php echo $deadline; ?></p>

                    <?php if ($proposal['file_path']): ?>
                    <p class="odd"><a href="<?php echo $proposal['file_path']; ?>"> Download</a></p>
                    <?php endif; ?>

                    <form action="supervisorProposalSubmission.php" method="post">
                        <select name="gradingStatus" class="even">
                            <option value="pending" <?php echo ($proposal['grading_status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                            <option value="reviewed" <?php echo ($proposal['grading_status'] == 'reviewed') ? 'selected' : ''; ?>>Reviewed</option>
                            <option value="complete" <?php echo ($proposal['grading_status'] == 'complete') ? 'selected' : ''; ?>>Complete</option>
                        </select>
                        <textarea  class="even" name="remarks" rows="5" cols="40"><?php echo $proposal['remarks']; ?></textarea>
                    </form>
                </div>
            </div>
            <button id="submit" type="submit">Submit Remarks</button>
        </div>
        <div class="grading rectangle">
            <h2> Award Marks </h2>
            <div class="grading-grid">
                <p><?php echo $proposal['first_name'] . ' ' . $proposal['last_name']; ?></p>
                <p id="submission-type">Proposal</p>
                <input id="marks">
            </div>
            <button id="submit" type="submit" onclick="location.href='award_marks.php?proposal_id=<?php echo $proposalId; ?>'">Submit Marks</button>
        </div>
    </div>
</body>
</html>
